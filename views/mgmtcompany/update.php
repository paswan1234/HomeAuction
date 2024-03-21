<?php
/* @var $this MgmtcompanyController */
/* @var $model Mgmtcompany */

$this->breadcrumbs = array(
    'Mgmtcompanies' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage Management Company', 'url' => array('admin')),
    array('label' => 'Add Management Company', 'url' => array('create')),
    array('label' => 'Create/Update Credentials', 'url' => array('credentails', 'id' => $model->id)),
    array('label' => 'Add Regional Manager', 'url' => array('addRegionalManager', 'id' => $model->id)),
);
?>
<h1>Update Management Company</h1>
<?php
$spname = str_replace(' ', '-', $model->name);
$spname = str_replace(',', '', $spname);
$spname = str_replace('.', '', $spname);
$urls = 'http://rentalhousingdeals.com/company/' . $model->state . '/' . $model->city . '/' . $spname . '/' . $model->id;
?>
<div>
    <span style="font-weight: bold;font-size: 14px;">Company Splash Page:-</span>
    <div class="input-group">
        <input id="spurl" class="input-lg" style="min-width:550px;" type="text" value="<?php echo $urls; ?>" readonly="" />
        <span class="input-group-button">
            <button data-clipboard-target="#spurl" data-clipboard-demo="" type="button" class="btn btn5">
                Copy
            </button>
        </span>
    </div>
</div>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.5/clipboard.min.js"></script>
<script>
    var clipboard = new Clipboard('.btn5');

    clipboard.on('success', function (e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        e.clearSelection();
    });

    clipboard.on('error', function (e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
</script>