<?php if ($editorial_is_on): ?>
<script>
  var user_type = '<?echo($user_level);?>'.toLowerCase();
  var project_type = '<?echo($book->scope);?>';

  // editorial constants
  var editorial_state_array = ['hidden','draft','edit','editreview','clean','ready','published'];
  var editorial_states = {
    "hidden": {'id': "hidden", 'name': "Hidden" , 'next': 'draft'},
    "draft": {'id': "draft", 'name': "Draft" , 'next': 'edit'},
    "edit": {'id': "edit", 'name': "Edit", 'next': 'editreview' },
    "editreview": {'id': "editreview", 'name': "Edit Review", 'next': 'clear' },
    "clean": {'id': "clean", 'name': "Clean", 'next': 'ready' },
    "ready": {'id': "ready", 'name': "Ready", 'next': 'published' },
    "published": {'id': "published", 'name': "Published" }
  };
  var editorial_quantifiers = {
    'all': 'This',
    'majority': 'Most of this',
    'minority': 'Some of this'
  };
  var editorial_messaging = {
    'author': {
      'draft': {
        'all': {
          'current_task': 'Continue working until you’re ready to submit it for editing.',
          'next_task': 'When you’re ready, click the button below to move all <strong>Draft</strong> content into the <strong>Edit</strong> state so it can be reviewed.',
          'next_task_buttons': ['Move all <strong>Draft</strong> content to <strong>Edit</strong>']
        },
        'majority': {
          'current_task': 'Continue working on the <strong>Draft</strong> portions until you’re ready to submit them for editing.',
          'next_task': 'When you’re ready, click the button below to move all <strong>Draft</strong> content into the <strong>Edit</strong> state so it can be reviewed.',
          'next_task_buttons': ['Move all <strong>Draft</strong> content to <strong>Edit</strong>']
        },
        'minority': {
          'current_task': 'Continue working on the <strong>Draft</strong> portions until you’re ready to submit them for editing.',
          'next_task': 'When you’re ready, click the button below to move all <strong>Draft</strong> content into the <strong>Edit</strong> state so it can be reviewed.',
          'next_task_buttons': ['Move all <strong>Draft</strong> content to <strong>Edit</strong>']
        }
      },
      'edit': {
        'all': {
          'current_task': 'As the editor completes their review, they will move content into the <strong>Edit Review</strong> state so you can respond.',
          'next_task': 'Please wait for an editor to move content into <strong>Edit Review</strong>.'
        },
        'majority': {
          'current_task': 'Review and respond to changes and queries on content in the <strong>Edit Review</strong> state.',
          'next_task': 'Move content from the <strong>Edit Review</strong> state to the Clean state as you respond to editor changes and queries.'
        },
        'minority': {
          'current_task': 'Review and respond to changes and queries on content in the <strong>Edit Review</strong> state.',
          'next_task': 'Move content from the <strong>Edit Review</strong> state to the Clean state as you respond to editor changes and queries.'
        }
      },
      'editreview': {
        'all': {
          'current_task': 'Review and respond to editor changes and queries.',
          'next_task': 'Move content from the <strong>Edit Review</strong> state to the Clean state as you respond to editor changes and queries.'
        },
        'majority': {
          'current_task': 'Review and respond to changes and queries on content in the <strong>Edit Review</strong> state.',
          'next_task': 'Move content from the <strong>Edit Review</strong> state to the Clean state as you respond to editor changes and queries.'
        },
        'minority': {
          'current_task': 'Review and respond to changes and queries on content in the <strong>Edit Review</strong> state.',
          'next_task': 'Move content from the <strong>Edit Review</strong> state to the Clean state as you respond to editor changes and queries.'
        }
      },
      'clean': {
        'all': {
          'current_task': 'As the editor finalizes their review, they will either move content back to the <strong>Edit Review</strong> state for further changes, or into the <strong>Ready</strong> state for publication.',
          'next_task': 'Please wait for an editor to do their final review of the content.'
        },
        'majority': {
          'current_task': 'As the editor finalizes their review, they will either move content back to the <strong>Edit Review</strong> state for further changes, or into the <strong>Ready</strong> state for publication.',
          'next_task': 'Please wait for an editor to do their final review of the content.'
        },
        'minority': {
          'current_task': 'As the editor finalizes their review, they will either move content back to the <strong>Edit Review</strong> state for further changes, or into the <strong>Ready</strong> state for publication.',
          'next_task': 'Please wait for an editor to do their final review of the content.'
        }
      },
      'ready': {
        'all': {
          'current_task': 'An editor will move content to the <strong>Published</strong> state when ready.',
          'next_task': 'Please wait for an editor to publish the content of this '+project_type+'.'
        },
        'majority': {
          'current_task': 'An editor will move content to the <strong>Published</strong> state when ready.',
          'next_task': 'Please wait for an editor to publish the content of this '+project_type+'.'
        },
        'minority': {
          'current_task': 'An editor will move content to the <strong>Published</strong> state when ready.',
          'next_task': 'Please wait for an editor to publish the content of this '+project_type+'.'
        }
      },
      'published': {
        'all': {
          'current_task': 'Congratulations!',
          'next_task': 'Any changes you make to the '+project_type+' will be published automatically.'
        }
      },
      'publishedWithEditions': {
        'all': {
          'current_task': 'Congratulations!',
          'next_task': 'Once an edition is created, its content cannot be changed. Any changes you make will be automatically moved to the <strong>Latest Edits</strong> edition.'
        }
      }
    },
    'editor': {
      'draft': {
        'all': {
          'current_task': 'As the author finishes their initial draft, they will move content to the <strong>Edit</strong> state for your review.',
          'next_task': 'Please wait for the author to submit content for editing.'
        },
        'majority': {
          'current_task': 'Review, make changes, and add queries to content in the <strong>Edit</strong> state by editing individual pages or using the <strong>Editorial Path</strong>.',
          'next_task': 'Move content in the <strong>Edit</strong> state to the <strong>Edit Review</strong> state as you finish making changes and adding queries to it.'
        },
        'minority': {
          'current_task': 'Review, make changes, and add queries to content in the <strong>Edit</strong> state by editing individual pages or using the <strong>Editorial Path</strong>.',
          'next_task': 'Move content in the <strong>Edit</strong> state to the <strong>Edit Review</strong> state as you finish making changes and adding queries to it.'
        }
      },
      'edit': {
        'all': {
          'current_task': 'Review, make changes, and add queries to content by editing individual pages or using the <strong>Editorial Path</strong>.',
          'next_task': 'Move content to the <strong>Edit Review</strong> state as you finish making changes and adding queries to it.'
        },
        'majority': {
          'current_task': 'Review, make changes, and add queries to content in the <strong>Edit</strong> state by editing individual pages or using the <strong>Editorial Path</strong>.',
          'next_task': 'Move content in the <strong>Edit</strong> state to the <strong>Edit Review</strong> state as you finish making changes and adding queries to it.'
        },
        'minority': {
          'current_task': 'Review, make changes, and add queries to content in the <strong>Edit</strong> state by editing individual pages or using the <strong>Editorial Path</strong>.',
          'next_task': 'Move content in the <strong>Edit</strong> state to the <strong>Edit Review</strong> state as you finish making changes and adding queries to it.'
        }
      },
      'editreview': {
        'all': {
          'current_task': 'As the author responds to the edits, they will move content to the <strong>Clean</strong> state for final review.',
          'next_task': 'Please wait for the author to move content to the <strong>Clean</strong> state.'
        },
        'majority': {
          'current_task': 'Do your final review on content in the <strong>Clean</strong> state.',
          'next_task': 'Move content in the <strong>Clean</strong> state back to <strong>Edit Review</strong> if it requires further changes, or to the <strong>Ready</strong> state for publication.'
        },
        'minority': {
          'current_task': 'Do your final review on content in the <strong>Clean</strong> state.',
          'next_task': 'Move content in the <strong>Clean</strong> state back to <strong>Edit Review</strong> if it requires further changes, or to the <strong>Ready</strong> state for publication.'
        }
      },
      'clean': {
        'all': {
          'current_task': 'Do your final review on the content.',
          'next_task': 'Move content back to the <strong>Edit Review</strong> state if it requires further changes, or to the <strong>Ready</strong> state for publication.'
        },
        'majority': {
          'current_task': 'Do your final review on content in the <strong>Clean</strong> state.',
          'next_task': 'Move content in the <strong>Clean</strong> state back to <strong>Edit Review</strong> if it requires further changes, or to the <strong>Ready</strong> state for publication.'
        },
        'minority': {
          'current_task': 'Do your final review on content in the <strong>Clean</strong> state.',
          'next_task': 'Move content in the <strong>Clean</strong> state back to <strong>Edit Review</strong> if it requires further changes, or to the <strong>Ready</strong> state for publication.'
        }
      },
      'ready': {
        'all': {
          'current_task': 'Publish it whenever the time is right.',
          'next_task': 'Move all content into the <strong>Published</strong> state to make it publicly available, or create a new public edition.',
          'next_task_buttons': ['Move all <strong>Draft</strong> content to <strong>Published</strong>','Create a new edition']
        },
        'majority': {
          'current_task': 'Publish it whenever the time is right.',
          'next_task': 'Move all content into the <strong>Published</strong> state to make it publicly available, or create a new public edition.',
          'next_task_buttons': ['Move all content to <strong>Published</strong>','Create a new edition']
        },
        'minority': {
          'current_task': 'Publish it whenever the time is right.',
          'next_task': 'Move all content into the <strong>Published</strong> state to make it publicly available, or create a new public edition.',
          'next_task_buttons': ['Move all content to <strong>Published</strong>','Create a new edition']
        }
      },
      'published': {
        'all': {
          'current_task': 'Congratulations!',
          'next_task': 'Any changes authors make to the '+project_type+' will be published automatically.'
        }
      },
      'publishedWithEditions': {
        'all': {
          'current_task': 'Congratulations!',
          'next_task': 'Once an edition is created, its content cannot be changed. Any changes authors make will be automatically moved to the <strong>Latest Edits</strong> edition.'
        }
      }
    }
  }

  $(document).ready(function() {

    $.ajax({
      url: $('link#sysroot').attr('href')+'system/api/get_editorial_count?book_id='+book_id,
      success: function(data) {

        console.log(data);

        var content_count = 0;
        var most_advanced_state = {'state':'hidden', 'count':0};

        // initial data processing; figure out the overall book state
        var currentIndex;
        var newIndex;
        for (var key in data) {
          if (key != 'usagerights') {
            currentIndex = editorial_state_array.indexOf(most_advanced_state.state);
            newIndex = editorial_state_array.indexOf(key);
            if (data[key] > 0 && newIndex > currentIndex) {
              most_advanced_state.state = key;
              most_advanced_state.count = data[key];
            }
            content_count += data[key];
          }
        }
        var editorial_state = editorial_states[most_advanced_state.state];

        var has_editions = false; // TODO: make this real
        var proxy_editorial_state = editorial_state;
        if (has_editions && editorial_state == 'published') {
          proxy_editorial_state += 'WithEditions';
        }

        // figure out how to quantify the overall book state
        var editorial_quantifier;
        if (most_advanced_state.count == content_count) {
          editorial_quantifier = 'all';
        } else if (most_advanced_state.count >= content_count * .5) {
          editorial_quantifier = 'majority';
        } else {
          editorial_quantifier = 'minority';
        }

        console.log(editorial_state);

        var current_messaging = editorial_messaging[user_type][proxy_editorial_state.id][editorial_quantifier];

        $('#primary-message > p').remove();
        $('#primary-message').prepend('<p><strong>'+editorial_quantifiers[editorial_quantifier]+' '+project_type+' is in the '+editorial_state['name']+' state.</strong><br>'+current_messaging['current_task']+'</p>');

        // build the editorial state gauge
        var percentage;
        var key;
        for (var index in editorial_state_array) {
          key = editorial_state_array[index];
          if (data[key] > 0) {
            percentage = parseFloat(data[key]) / content_count * 100;
            $('.editorial-gauge').append('<a href="#" class="'+key+'-state editorial-fragment" style="width: '+percentage+'%" data-toggle="popover" role="button" data-placement="bottom" title="'+editorial_states[key]['name']+'" data-content="'+Math.round(percentage)+'% / '+data[key]+' items">&nbsp;&nbsp;<strong>'+editorial_states[key]['name']+'</strong>&nbsp;&nbsp;</a>');
          }
        }
        $('.editorial-fragment').each(function() {
          $(this).popover({ 
            trigger: "hover click", 
            html: true, 
            template: '<div class="popover caption_font" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
          });
        });

        // build the usage rights gauge
        usage_rights_percentage = parseFloat(data['usagerights']) / content_count * 100;
        $('.usage-rights-gauge').append('<div class="usage-rights-fragment" style="width: '+usage_rights_percentage+'%"></div>Usage rights: '+Math.round(usage_rights_percentage)+'%');

        // build the next steps messaging
        $('#secondary-message').append('<p>'+current_messaging['next_task']+'</p>');
        for (var index in current_messaging['next_task_buttons']) {
          $('#secondary-message').append('<button class="btn btn-block btn-state '+editorial_state['next']+'-state">'+current_messaging['next_task_buttons'][index]+'</button>');
        }
      }
    });
  });
</script>

<div class="container-fluid properties">
  <div class="row editorial-summary">
    <div class="col-md-8">
      <div id="primary-message" class="message-pane">
        <p>Getting current editorial status, one moment...</p>
        <div class="editorial-gauge"></div>
        <div class="usage-rights-gauge"></div>
      </div>
    </div>
    <div class="col-md-4">
      <div id="secondary-message" class="message-pane dark"></div>
    </div>
  </div>
  <!--<div class="row">
    <div class="col-md-12">
      <h4>Browse content by state</h4>
      <p>(Content selector goes here)</p>
    </div>
  </div>-->
  <div class="row">
    <section class="col-xs-7">
      <p><br><br><button class="btn btn-primary" data-toggle="modal" data-target="#confirmEditorialWorkflow">Disable editorial workflow</button></p>
    </section>
  </div>
</div>
<div class="modal fade" id="confirmEditorialWorkflow" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?=confirm_slash(base_url())?>system/dashboard" method="post">
      <input type="hidden" name="book_id" value="<?=$book->book_id?>" />  
      <input type="hidden" name="action" value="enable_editorial_workflow" />
      <input type="hidden" name="enable" value="0" />
      <div class="modal-header">
      	<h4>Confirm</h4>
      </div>
      <div class="modal-body">
       	  <p>Are you sure you wish to turn off the Editorial Workflow for this book?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Turn off</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php elseif ($can_editorial): ?>
<div class="container-fluid properties">
  <div class="row">
    <section class="col-xs-7">
      <h3 style="margin-top:0px; padding-top:0px; margin-bottom:16px; padding-bottom:0px;">Editorial Workflow</h3>
      <p>
      Track the editorial state of each piece of content in your book.  Enable editorial workflow on the current
      book by clicking the button below, or <a href="javascript:void(null);">learn more</a>.
      <br /><br />
      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#confirmEditorialWorkflow">Enable editorial workflow</button>
      </p>
    </section>
  </div>
</div>
<div class="modal fade" id="confirmEditorialWorkflow" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?=confirm_slash(base_url())?>system/dashboard" method="post">
      <input type="hidden" name="book_id" value="<?=$book->book_id?>" />  
      <input type="hidden" name="action" value="enable_editorial_workflow" />
      <input type="hidden" name="enable" value="1" />
      <div class="modal-header">
      	<h4>Confirm</h4>
      </div>
      <div class="modal-body">
       	  <p>Are you sure you wish to turn on the Editorial Workflow for this book?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Turn on</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php else: ?>
<div class="container-fluid properties">
  <div class="row">
    <section class="col-xs-7">
      <h3 style="margin-top:0px; padding-top:0px; margin-bottom:16px; padding-bottom:0px;">Editorial Workflow</h3>
      <p>
      Track the editorial state of each piece of content in your book.  Enable editorial workflow on the current
      book by clicking the button below, or <a href="javascript:void(null);">learn more</a>.
      </p>
      <p>
      <strong>The database for this Scalar install hasn't been updated to support Editorial Workflow features.</strong> 
      </p>
      <p>
      Contact a system administrator to <a href="https://github.com/anvc/scalar/wiki/Changes-to-config-files-over-time" target="_blank">update Scalar's database</a>. 
      </p>
    </section>
  </div>
</div>
<?php endif; ?>