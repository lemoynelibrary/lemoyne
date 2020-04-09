<?php

//make sure that the bib number is actually a number
if ( ! (is_numeric ($_GET["b"])) ) {
	exit(1);
}

else {
	//debug
	//echo $_GET["b"];

	//convert our bib number to an int, if it's not already
	$b = (int) $_GET["b"];
}

	if ($_GET["debug"] == 'yes' ) {
		echo "
		<!DOCTYPE html>
		<head>
		<title>testing</title>
		</head>
		<body>
		<h3>bibliographic record info</h3>
		";
	}

	function doQuery($b) {

		/* include file (bibliographic.php) supplies the following arguments as the example below illustrates :
			$username = "username";
			$password = "password";

			$dsn = "pgsql:"
				. "host=sierra-db.school.edu;"
				. "dbname=iii;"
				. "port=1032;"
				. "sslmode=require;"
				. "charset=utf8;"
		*/

		//reset all variables needed for our connection
		$username = null;
		$password = null;
		$dsn= null;
		$connection = null;

		require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/bibliographic.php');

		//	debug
		//echo $dsn . "\n";

		//make our database connection
		try {
			$connection = new PDO($dsn, $username, $password);
		}

		catch ( PDOException $e ) {
			echo "problem connecting to database...\n";
			error_log('PDO Exception: '.$e->getMessage());
			exit(1);
		}


		//set output to utf-8
		$connection->query('SET NAMES UNICODE');

		//query
		$sql='
		select
		p.material_code,
		p.bib_level_code,
		p.best_title,
		p.best_author,
		p.publish_year,
		i.call_number_norm,
		s.marc_tag,
		s.tag,
		s.content
		from
		sierra_view.record_metadata             r
		JOIN
		sierra_view.subfield					s
			  ON (r.id = s.record_id)
		JOIN
		sierra_view.bib_record_property         p
				ON (r.id = p.bib_record_id)
		left outer JOIN
		sierra_view.bib_record_item_record_link l
				ON (r.id = l.bib_record_id)
		left outer JOIN
		sierra_view.item_record_property		i
				ON (l.item_record_id = i.item_record_id)
		where r.record_num = ' . $b . ' AND r.record_type_code = \'b\'
		order by s.marc_tag
		';
		//debug
		//echo $sql;
		//echo "marc_tag\t\t";
		//echo "tag\t";
		//echo "content\t\n";

		$row_count = 0;


		$material_code = '';
		$bib_level_code = '';
		$best_title = '';
		$best_author = '';
		$publish_year = '';
		$call_number_norm = '';
		$marc_001 = '';
		$marc_20 = '';
		$marc_22 = '';
		

		foreach ($connection->query($sql) as $row) {

			if ($material_code == '') {
				 $material_code = $row['material_code'];
			}
			if ($bib_level_code == '') {
				$bib_level_code = $row['bib_level_code'];
			}
			if ($best_title == '') {
				$best_title = $row['best_title'];
			}
			if ($best_author == '') {
				$best_author = $row['best_author'];
			}
			if ($publish_year == '') {
				$publish_year = $row['publish_year'];
			}
			if ($call_number_norm == '') {
				$call_number_norm = $row['call_number_norm'];
			}
			if ($marc_001 == '') {
				if ($row['marc_tag'] == '001')
				$marc_001 = $row['content'];
			}
			if ($marc_20 == '') {
				if ($row['marc_tag'] == '020' && $row['tag'] == 'a')
				$marc_20 = $row['content'];
			}
			if ($marc_22 == '') {
				if ($row['marc_tag'] == '022' && $row['tag'] == 'a')
				$marc_20 = $row['content'];
			}

			$row_count++;
		}

		//debug section
		if ($_GET["debug"] == 'yes' ) {
			echo "<pre>";
			echo " material_code: '" . $material_code . "'"; 			//
			echo "\n bib_level_code: '" . $bib_level_code . "'";		//
			echo "\n best_title: " . $best_title;				// LoanTitle	PhotoJournalTitle
			echo "\n best_author: " . $best_author;				// LoanAuthor
			echo "\n publish_year: " . $publish_year;			// LoanDate
			echo "\n call_number_norm: " . $call_number_norm;	// CallNumber
			echo "\n marc_001: " . $marc_001;					// ESPNumber
			echo "\n marc_20: " . $marc_20;						// ISSN
			echo "\n marc_22: " . $marc_22;						// ISSN
			echo "</pre>";
		}
		//end debug section
		
		if ( ($material_code == "s") && ($bib_level_code == "s") ) {
			//journal request form
			$illiad_url = 'https://udayton.illiad.oclc.org/illiad/illiad.dll?Action%3D10&Form%3D20&Value%3DGenericRequestArticle-Faculty';

			$illiad_url .= '&PhotoJournalTitle=';
			$illiad_url .= urlencode($best_title);
	
			$illiad_url .= '&PhotoArticleAuthor=';
			$illiad_url .= urlencode($best_author);
			
			$illiad_url .= '&CallNumber=';
			$illiad_url .= urlencode($call_number_norm);
			
			$illiad_url .= '&ESPNumber=';
			$illiad_url .= urlencode($marc_001);

			$illiad_url .= '&ISSN=';
			$illiad_url .= urlencode($marc_20);
			
		}
		else {
		
			//book request form
			$illiad_url = 'https://udayton.illiad.oclc.org/illiad/illiad.dll?Action=10&Form=20&Value=GenericRequestBook-Faculty';
			
			$illiad_url .= '&LoanTitle=';
			$illiad_url .= urlencode($best_title);
	
			$illiad_url .= '&LoanAuthor=';
			$illiad_url .= urlencode($best_author);
			
			$illiad_url .= '&LoanDate=';
			$illiad_url .= urlencode($publish_year);
			
			$illiad_url .= '&CallNumber=';
			$illiad_url .= urlencode($call_number_norm);
			
			$illiad_url .= '&ESPNumber=';
			$illiad_url .= urlencode($marc_001);

			$illiad_url .= '&ISSN=';
			$illiad_url .= urlencode($marc_20);

		}
		
		if ($_GET["debug"] == 'yes' ) {
			echo "<a href='";
			echo $illiad_url;
			echo "'>";
			echo $illiad_url;
			echo "</a>";
		}

		//close our connection
		$connection = null;

		//direct them to the illiad URL we constructed
		if ($_GET["debug"] != 'yes') {
			header("Location: " . $illiad_url);
			die();
		}
		
	} //end function doQuery


	//perform our query
	doQuery($b);

	if ($_GET["debug"] == 'yes') {
		echo "
		</body>
		</html>
		";
	}
?>