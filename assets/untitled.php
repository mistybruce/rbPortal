
<?php
// get asset id
$asset_id=isset($_GET['asset_id']) ? $_GET['asset_id'] : die('ERROR: Asset ID not found.');
 
// include database and object files
include_once 'connect.php'; 
$database = new Database(); 
$conn = $database->getConnection();
 
// initialize object
$product = new Asset($database);
 
// set asset id property
$asset->id=$id_asset;
 
// read single asset
$asset->readOne();
?>
<!--we have our html form here where new asset information will be entered-->
<form id='update-asset-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        <tr>
            <td>Asset</td>
            <td><input type='text' name='name' class='form-control' value='<?php echo htmlspecialchars($asset->name, ENT_QUOTES); ?>' required /></td>
        </tr>
            <td>
                <!-- hidden ID field so that we could identify what record is to be updated -->
                <input type='hidden' name='id' value='<?php echo $id_asset ?>' /> 
            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-edit'></span> Save Changes
                </button>
            </td>
        </tr>
    </table>
</form>