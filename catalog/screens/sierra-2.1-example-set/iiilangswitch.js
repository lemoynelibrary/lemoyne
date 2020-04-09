  /*
*  Rel 2009B Example Set
*  This File Last Changed: 3 February 2012 */

// javascript language switch for WebPAC and AirPAC for Smartphones
//Purpose: Click a link to switch language on a WebPAC or AirPAC for Smartphones screen. Rather than start over at the site root, reload the current URL with the appropriate lang code inserted into the URL.


function iiiSwitchLang(lang)
{

      str=location.href;
      str=str.replace(/\*.../, "");

      var help_pattern=/(.*)\/(help)(.*)/gi;
      //For AirPAC Smartphones libinfo pages
      var libinfo_pattern=/(.*)\/(screens).*?\/(libinfo)(_[0-9]+)(_.*?)?(.html)/gi;
      //For static screen HTML pages
      var static_pattern=/(.*)\/(screens)\/(.*?)(_.*?)?(.html)/gi;
      //For system generate pages
      var search_pattern=/(.*)\/\/(.*?)\/(.*?)\/(.*)/gi;

      var match = help_pattern.exec(str);
      var result = "";
      if (match)
      {
           result = match[1] + "/" + match[2] + "*" + lang + match[3];
      }
      else if ((match = libinfo_pattern.exec(str)))
      {
             if  (lang == "eng" )
		     result = match[1] + "/" + match[2] + "/" + match[3] + match[4] + match[6];
            else
                   result = match[1] + "/" + match[2] + "*" + lang + "/" + match[3] + match[4] + "_" + lang + match[6];
      }
      else if ((match = static_pattern.exec(str)))
      {
           if  (lang == "eng" )
                 result = match[1] + "/" + match[2] + "/" + match[3] + match[5];
           else
                 result = match[1] + "/" + match[2] + "*" + lang + "/" + match[3] + "_" + lang + match[5];
      }
      else if ((match = search_pattern.exec(str)))
      {
	      if  (lang == "eng" )
		     result = match[1] + "//" + match[2] + "/" + match[3] + "/" + match[4];
	      else
                   result = match[1] + "//" + match[2] + "/" + match[3] + "*" + lang + "/" + match[4];
      }
	else
	{
	//This is the default line that always set as the last match
		result = str + "*" + lang;
	}
     location.href=result;
}
