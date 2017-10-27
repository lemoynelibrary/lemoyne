(function() {

  // Insert the AskUs sidebar icon on page - positioned with CSS

  $("body").append('<a id="lh3-askus-sidebar" href="#">');
  $("#lh3-askus-sidebar").click(function(){
    return askUs.launchAskUs();
  });

  // lots of of Le Moyne-specific HTML to build the elements within the modal box

  $("body").append('<div id="lh3-askus-modal-dialog" title="Got a Question? Ask Us!" style="display:none">');
  $("#lh3-askus-modal-dialog").append('<div id="lh3-askus-faq">');
  $("#lh3-askus-faq").append('<div style="margin-bottom: 3px;"><strong>Search our frequently asked questions...</strong></div>');
  $("#lh3-askus-faq").append('<div class="lh3-faq-search" data-submit-value="Ask Us"></div>');
  $("#lh3-askus-faq").append('<div id="lh3-faq-autosuggest"><table></table></div>');
  $("#lh3-askus-modal-dialog").append('<div id="lh3-services" class="row">');
  $("#lh3-services").append('<div id="lh3-chat-box" class="col-sm-6">');
  $("#lh3-services").append('<div id="lh3-askus-box" class="col-sm-6">');
  $("#lh3-chat-box").append('<strong>Chat with a Librarian 24/7</strong>');
  $("#lh3-chat-box").append('<a><img id="lh3-chat-box--image" src="https://0be6e7b30f70d54c41e2-1cba4c36ec78f50a350878d40a7c96c2.ssl.cf1.rackcdn.com/libraryh3lp/img/chatbox-libraryh3lp-small.png"></a>')
  $("#lh3-askus-box").append('<strong>Ways to Ask Us</strong>');
  $("#lh3-askus-box").append('<ul id="lh3-askus-box--list">');
  $("#lh3-askus-box--list").append('<li><img alt="Ask Us by Chat" src="https://0be6e7b30f70d54c41e2-1cba4c36ec78f50a350878d40a7c96c2.ssl.cf1.rackcdn.com/libraryh3lp/img/askus_by-chat.svg"><a target="_top" href="http://resources.library.lemoyne.edu/askus/by-chat">Ask Us by Chat</a></li>');
  $("#lh3-askus-box--list").append('<li><img alt="Ask Us by Email" src="https://0be6e7b30f70d54c41e2-1cba4c36ec78f50a350878d40a7c96c2.ssl.cf1.rackcdn.com/libraryh3lp/img/askus_by-email.svg"><a target="_top" href="http://resources.library.lemoyne.edu/askus/by-email">Ask Us by Email</a></li>');
  $("#lh3-askus-box--list").append('<li><img alt="Ask Us by Text" src="https://0be6e7b30f70d54c41e2-1cba4c36ec78f50a350878d40a7c96c2.ssl.cf1.rackcdn.com/libraryh3lp/img/askus_by-text.svg"><a target="_top" href="http://resources.library.lemoyne.edu/askus/by-text">Ask Us by Text</a></li>');
  $("#lh3-askus-box--list").append('<li><img alt="Ask Us by Phone" src="https://0be6e7b30f70d54c41e2-1cba4c36ec78f50a350878d40a7c96c2.ssl.cf1.rackcdn.com/libraryh3lp/img/askus_by-phone.svg"><a target="_top" href="http://resources.library.lemoyne.edu/askus/by-phone">Ask Us by Phone</a></li>');
  $("#lh3-askus-box--list").append('<li><img alt="Ask Us in Person" src="https://0be6e7b30f70d54c41e2-1cba4c36ec78f50a350878d40a7c96c2.ssl.cf1.rackcdn.com/libraryh3lp/img/askus_in-person.svg"><a target="_top" href="http://resources.library.lemoyne.edu/askus/in-person"> Ask Us in Person</a></li>');
  $("#lh3-askus-box--list").append('<li><img alt="Ask Us FAQ" src="https://0be6e7b30f70d54c41e2-1cba4c36ec78f50a350878d40a7c96c2.ssl.cf1.rackcdn.com/libraryh3lp/img/askus_faq.svg"><a target="_top" href="http://resources.library.lemoyne.edu/askus/faq"> Ask Us FAQ</a></li>');

  // Load the current queue into the chat box -- still needs to change state based on queue

  window.askUs = {
    activeChatLayer: 'lemoyne-reference',

    // Ordered from least to most specific.
    chatLayers: {
      'ajcu-chatstaff': 'https://us.libraryh3lp.com/chat/ajcu-chatstaff@chat.libraryh3lp.com?skin=20074&title=Ask+A+Librarian+(ChatStaff)&sounds=true&profile=cs-lemoyne',
      'ajcu-consortium': 'https://us.libraryh3lp.com/chat/ajcu-consortium@chat.libraryh3lp.com?skin=20074&title=Ask+A+Librarian+(AJCU)&sounds=true&profile=cs-lemoyne',
      'lemoyne-reference': 'https://us.libraryh3lp.com/chat/lemoyne-reference@chat.libraryh3lp.com?skin=20074'
    },

    chatLayerQueues: ['ajcu-chatstaff', 'ajcu-consortium', 'lemoyne-reference'],

    getChatUrl: function(queue) {
      return askUs.chatLayers[queue || askUs.activeChatLayer];
    },

    launchAskUs: function() {
      $('#lh3-askus-modal-dialog').dialog('open');
    },

    checkPresence: function(queue) {
      $.ajax({
        url: ['https://us.libraryh3lp.com/presence/jid', queue, 'chat.libraryh3lp.com', 'js'].join('/'),
        dataType: 'jsonp',
        jsonp: 'cb',
        success: function() {
          var isActive = false;
          for (var i = 0; i < jabber_resources.length; ++i) {
            var resource = jabber_resources[i];
            if (resource.show === 'available' || resource.show === 'chat') {
              askUs.activeChatLayer = queue;
              isActive = true;
              $('#lh3-chat-box a').click(function(){
                window.open(askUs.getChatUrl(), 'chat', 'resizable=1,width=480,height=350');
                return false;
              });
            }
          }
          if (! isActive && askUs.chatLayerQueues.length > 0) {
            askUs.checkPresence(askUs.chatLayerQueues.pop());
          }
        }
      });
    }
  };

  askUs.checkPresence(askUs.chatLayerQueues.pop());

  $('#lh3-askus-modal-dialog').dialog({
    autoOpen: false,
    closeOnEscape: true,
    create: function() {},
    draggable: true,
    modal: true,
    resizable: false,
    width: 575
  });


  // set up the FAQ search box with autosuggest

  window.lh3FAQ = {
    site: 'lemoyne.ask.libraryh3lp.com',
    clearInstantResults: function() {
      $('.lh3-faq-search input[name="q"]').attr('autocomplete', 'off');
      $('#lh3-faq-autosuggest table').empty();
    },
    fetchInstantResults: function() {
      var question = $.trim($('.lh3-faq-search input[name="q"]').val()).replace('\u00A0', '');
      if (question.length === 0) {
        lh3FAQ.clearInstantResults();
        return;
      }
      var topic = $('.lh3-faq-search select').val(),
          query = { 'q': question, '_': new Date().getTime() };
      if (topic !== 'All') {
        query.topic = topic;
      }
      $.ajax({
        url: ['https:/', lh3FAQ.site, 'instant'].join('/'),
        data: query,
        dataType: 'jsonp',
        jsonp: 'callback',
        success: lh3FAQ.showInstantResults
      });
    },
    showInstantResults: function(results) {
      var resultsList = $('#lh3-faq-autosuggest table');
      resultsList.empty();
      $.each(results, function(index, result) {
        resultsList.append($('<tr><td><a href="http://' + lh3FAQ.site + '/questions/' + result.id + '" target="_top">' + result.html + '</a></td></tr>'));
      });
    }
  };

  $('.lh3-faq-search')
    .on('click touchstart', lh3FAQ.clearInstantResults)
    .on('keyup', lh3FAQ.fetchInstantResults);

  // the item below seems to mess up functionality in sidebar widget !
  //$(document.body).on('click touchstart', lh3FAQ.clearInstantResults);

  var x = document.createElement("script"); x.type = "text/javascript"; x.async = true;
  x.src = "https://lemoyne.ask.libraryh3lp.com/js/faq-embeddable/embed.js";
  var y = document.getElementsByTagName("script")[0]; y.parentNode.insertBefore(x, y);

})();


