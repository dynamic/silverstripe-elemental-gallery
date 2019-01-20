<?php

namespace Dynamic\Elements\Gallery\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Gallery\Model\GalleryImage;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\ORM\FieldType\DBField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class ElementPhotoGallery.
 */
class ElementPhotoGallery extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'font-icon-p-gallery';

    /**
     * @return string
     */
    private static $singular_name = 'Photo Gallery Element';

    /**
     * @return string
     */
    private static $plural_name = 'Photo Gallery Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementPhotoGallery';

    /**
     * @var array
     */
    private static $has_many = array(
        'Images' => GalleryImage::class,
    );

    /**
     * Set to false to prevent an in-line edit form from showing in an elemental area. Instead the element will be
     * clickable and a GridFieldDetailForm will be used.
     *
     * @config
     * @var bool
     */
    private static $inline_editable = false;

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'Images',
        ]);
        if ($this->ID) {
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows('SortOrder'));
            $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
            $config->removeComponentsByType(GridFieldDeleteAction::class);
            $imagesField = GridField::create('Images', 'Images', $this->Images()->sort('SortOrder'), $config);
            $fields->addFieldToTab('Root.Main', $imagesField);
        }

        return $fields;
    }

    /**
     * @return DBHTMLText
     */
    public function getSummary()
    {
        if ($this->Images()->count() == 1) {
            $label = ' image';
        } else {
            $label = ' images';
        }
        return DBField::create_field('HTMLText', $this->Images()->count() . ' ' . $label)->Summary(20);
    }

    /**
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'Photo Gallery');
    }
}
