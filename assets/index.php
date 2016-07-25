<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Read Assets</title>
     
    <!-- bootstrap CSS -->
    <link href="libs/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" media="screen" />
     
</head>
<body>
 
    <!-- container -->
<div class="container">
     
    <div class='page-header'>
     <h1 id='page-title'>Read Assets</h1>
    </div>

     <div class='margin-bottom-1em overflow-hidden'>
     <!-- when clicked, it will show the asset's list -->
    <div id='read-assets' class='btn btn-primary pull-right display-none'>
        <span class='glyphicon glyphicon-list'></span> Read Assets
    </div>

       <!--when clicked, will load the edit asset form-->
     <div id='create-asset' class='btn btn-primary pull-right'>
        <span class='glyphicon glyphicon-plus'></span> Update Asset
    </div>

    <!-- when clicked, it will load the create asset form -->
    <div id='create-asset' class='btn btn-primary pull-right'>
        <span class='glyphicon glyphicon-plus'></span> Create Asset
    </div>

      <!--when clicked, will load the delete asset form-->
     <div id='delete-asset' class='btn btn-primary pull-right'>
        <span class='glyphicon glyphicon-plus'></span> Delete Asset
    </div>
 
</div>
         
  <div class="container-fluid">
<!-- this is where the contents will be shown. -->
   <div id='page-content'>
        
   </div>
   </div>
  
      
<!-- jQuery library -->
<script src="libs/js/jquery.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="libs/js/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="libs/js/bootstrap/docs-assets/js/holder.js"></script>

<script type='text/javascript'>
function changePageTitle(page_title){   
    // change page title
    $('#page-title').text(page_title);     
    // change title tag
    document.title=page_title;
} >
<script type='text/javascript'>
$(document).ready(function(){
// will run if create asset form was submitted
$(document).on('submit', '#Create_Form', function() {     
    // post the data from the form
    $.post("create.php", $(this).serialize())
        .done(function(data) {             
            // show create asset button
            $('#create-asset').show();             
            // hide read assets button
            $('#read-assets').hide();
            // view assets on load of the page
               showassets(); 
          // clicking the 'read assets' button
          $('#read-assets').click(function(){     
               
         // hide read assets button
          $('#read-assets').hide();     
            // show assets
           showassets();
        });
           // read assets
         function showAssets(){         
          // change page title
         changePageTitle('Read assets');
            // fade out effect first
          $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('read.php', function(){
            $('#page-content').fadeIn('slow');
        });
    });
}                       
            showassets();
        });
             
    return false;
});
    // will show the create asset form
    $('#create_asset').click(function(){
        // change page title
        changePageTitle('Create asset');        
        // hide create asset button
        $('#create_asset').hide();
         
        // show read assets button
        $('#read-assets').show();
        $('#page-content').load('Create_Form.php', function(){ 
            });
        });
    });
};

// clicking the edit button
$(document).on('click', '.edit-btn', function(){ 
 
    // change page title
    changePageTitle('Update Asset');
 
    var asset_id = $(this).closest('td').find('.asset-id').text();
     
    // hide create product button
    $('#create-asset').hide();
     
    // show read products button
    $('#read-assets').show();
 
    // fade out effect first
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('update_form.php?asset_id=' + asset_id, function(){
              
            // fade in effect
            $('#page-content').fadeIn('slow');
        });
    });
});

// will run if update product form was submitted
$(document).on('submit', '#update-asset-form', function() {
     
    // post the data from the form
    $.post("update.php", $(this).serialize())
        .done(function(data) {
             
            // show create product button
            $('#create-asset').show();
             
            // hide read products button
            $('#read-assets').hide();

            showProducts();
        });
             
    return false;
});

// will run if the delete button was clicked
$(document).on('click', '.delete-btn', function(){ 
    if(confirm('Are you sure?')){
     
        // get the id
        var asset_id = $(this).closest('td').find('.asset_id').text();
         
        // trigger the delete file
        $.post("delete.php", { id: asset_id })
            .done(function(data){
                console.log(data);
                 
                // reload the product list
                showAssets();
                 
            });
    }
});

</script>
 
</body>
</html>