<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs = array(
    'Site Settings' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Change Password', 'url' => array('changePassword')),
    array('label' => 'Add/Edit Parking Type', 'url' => array('parkingType/create')),
    array('label' => 'Add/Edit Structure Type', 'url' => array('structureType/create')),
    array('label' => 'Add/Edit Amenities', 'url' => array('amenities/create')),
    array('label' => 'Site Settings', 'url' => array('settings/add')),
    array('label' => 'Manage Banner', 'url' => array('banner/admin')),
    array('label' => 'Manage Newsletter Subscription', 'url' => array('newsletterSubscription/admin')),
    array('label' => 'State SEO Info', 'url' => array('state/admin')),
    array('label' => 'City SEO Info', 'url' => array('city/admin')),
    array('label' => 'Landing Pages Seo', 'url' => array('seoSettings/add')),
    array('label' => 'Search Pages Seo', 'url' => array('seoSettings/metaTags')),
);
?>

<h1>Site Settings</h1>


<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'property-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    
    <?php echo CHtml::label('Meta Details for affordable housing property search state only page. ex. http://rentalhousingdeals.com/CA', 'search_state'); ?>
    
    <?php echo CHtml::label('Title', 'search_title_state'); ?>
    <?php echo CHtml::textField('SeoSettings[search_title_state]', $model->getSettingValue('search_title_state')); ?>
    <?php echo CHtml::label('Keyword', 'search_keyword_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[search_keyword_state]', $model->getSettingValue('search_keyword_state')); ?>
    <?php echo CHtml::label('Meta Description', 'search_description_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[search_description_state]', $model->getSettingValue('search_description_state')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for sinor housing property search state only page. ex. http://rentalhousingdeals.com/senior-housing/CA', 'search_state'); ?>
    
    <?php echo CHtml::label('Title', 'sin_search_title_state'); ?>
    <?php echo CHtml::textField('SeoSettings[sin_search_title_state]', $model->getSettingValue('sin_search_title_state')); ?>
    <?php echo CHtml::label('Keyword', 'sin_search_keyword_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[sin_search_keyword_state]', $model->getSettingValue('sin_search_keyword_state')); ?>
    <?php echo CHtml::label('Meta Description', 'sin_search_description_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[sin_search_description_state]', $model->getSettingValue('sin_search_description_state')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for section8 housing property search state only page. ex. http://rentalhousingdeals.com/section8/CA', 'search_state'); ?>
    
    <?php echo CHtml::label('Title', 's8_search_title_state'); ?>
    <?php echo CHtml::textField('SeoSettings[s8_search_title_state]', $model->getSettingValue('s8_search_title_state')); ?>
    <?php echo CHtml::label('Keyword', 's8_search_keyword_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[s8_search_keyword_state]', $model->getSettingValue('s8_search_keyword_state')); ?>
    <?php echo CHtml::label('Meta Description', 's8_search_description_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[s8_search_description_state]', $model->getSettingValue('s8_search_description_state')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for afordable housing property search city only page. ex. http://rentalhousingdeals.com/CA/Los-Angeles', 'search_city'); ?>
    
    <?php echo CHtml::label('Title', 'search_title_city'); ?>
    <?php echo CHtml::textField('SeoSettings[search_title_city]', $model->getSettingValue('search_title_city')); ?>
    <?php echo CHtml::label('Keyword', 'search_keyword_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[search_keyword_city]', $model->getSettingValue('search_keyword_city')); ?>
    <?php echo CHtml::label('Meta Description', 'search_description_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[search_description_city]', $model->getSettingValue('search_description_city')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for senior housing  property search city only page. ex. http://rentalhousingdeals.com/senior-housing/CA/Los-Angeles', 'search_city'); ?>
    
    <?php echo CHtml::label('Title', 'sin_search_title_city'); ?>
    <?php echo CHtml::textField('SeoSettings[sin_search_title_city]', $model->getSettingValue('sin_search_title_city')); ?>
    <?php echo CHtml::label('Keyword', 'sin_search_keyword_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[sin_search_keyword_city]', $model->getSettingValue('sin_search_keyword_city')); ?>
    <?php echo CHtml::label('Meta Description', 'sin_search_description_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[sin_search_description_city]', $model->getSettingValue('sin_search_description_city')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for section8 housing  property search city only page. ex. http://rentalhousingdeals.com/section8-housing/CA/Los-Angeles', 'search_city'); ?>
    
    <?php echo CHtml::label('Title', 's8_search_title_city'); ?>
    <?php echo CHtml::textField('SeoSettings[s8_search_title_city]', $model->getSettingValue('s8_search_title_city')); ?>
    <?php echo CHtml::label('Keyword', 's8_search_keyword_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[s8_search_keyword_city]', $model->getSettingValue('s8_search_keyword_city')); ?>
    <?php echo CHtml::label('Meta Description', 's8_search_description_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[s8_search_description_city]', $model->getSettingValue('s8_search_description_city')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for property detail page. ex. http://rentalhousingdeals.com/CA/Los-Angeles/Property-Name', 'search_detail'); ?>
    
    <?php echo CHtml::label('Title', 'search_title_detail'); ?>
    <?php echo CHtml::textField('SeoSettings[search_title_detail]', $model->getSettingValue('search_title_detail')); ?>
    <?php echo CHtml::label('Keyword', 'search_keyword_detail'); ?>
    <?php echo CHtml::textArea('SeoSettings[search_keyword_detail]', $model->getSettingValue('search_keyword_detail')); ?>
    <?php echo CHtml::label('Meta Description', 'search_description_detail'); ?>
    <?php echo CHtml::textArea('SeoSettings[search_description_detail]', $model->getSettingValue('search_description_detail')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for housing authority search state only page. ex. http://rentalhousingdeals.com/housing-authority/CA', 'searchha_state'); ?>
    
    <?php echo CHtml::label('Title', 'searchha_title_state'); ?>
    <?php echo CHtml::textField('SeoSettings[searchha_title_state]', $model->getSettingValue('searchha_title_state')); ?>
    <?php echo CHtml::label('Keyword', 'searchha_keyword_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[searchha_keyword_state]', $model->getSettingValue('searchha_keyword_state')); ?>
    <?php echo CHtml::label('Meta Description', 'searchha_description_state'); ?>
    <?php echo CHtml::textArea('SeoSettings[searchha_description_state]', $model->getSettingValue('searchha_description_state')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for housing authority search city only page. ex. http://rentalhousingdeals.com/housing-authority/CA/Los-Angeles', 'searchha_city'); ?>
    
    <?php echo CHtml::label('Title', 'searchha_title_city'); ?>
    <?php echo CHtml::textField('SeoSettings[searchha_title_city]', $model->getSettingValue('searchha_title_city')); ?>
    <?php echo CHtml::label('Keyword', 'search_keyword_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[searchha_keyword_city]', $model->getSettingValue('searchha_keyword_city')); ?>
    <?php echo CHtml::label('Meta Description', 'searchha_description_city'); ?>
    <?php echo CHtml::textArea('SeoSettings[searchha_description_city]', $model->getSettingValue('searchha_description_city')); ?>
    
    <br>
    ---------------------------------------------------------------------------------------
    <br>
    
    <?php echo CHtml::label('Meta Details for housing authority detail page. ex. http://rentalhousingdeals.com/housing-authority/CA/Los-Angeles/Housing-Authority-Name', 'searchha_detail'); ?>
    
    <?php echo CHtml::label('Title', 'searchha_title_detail'); ?>
    <?php echo CHtml::textField('SeoSettings[searchha_title_detail]', $model->getSettingValue('searchha_title_detail')); ?>
    <?php echo CHtml::label('Keyword', 'searchha_keyword_detail'); ?>
    <?php echo CHtml::textArea('SeoSettings[searchha_keyword_detail]', $model->getSettingValue('searchha_keyword_detail')); ?>
    <?php echo CHtml::label('Meta Description', 'searchha_description_detail'); ?>
    <?php echo CHtml::textArea('SeoSettings[searchha_description_detail]', $model->getSettingValue('searchha_description_detail')); ?>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Save',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->