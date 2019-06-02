<?php

namespace Dynamic\Elements\Gallery\Elements;

use Colymba\BulkUpload\BulkUploader;
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
    private static $db = [
        'Content' => 'HTMLText',
    ];

    /**
     * @var array
     */
    private static $has_many = array(
        'Images' => GalleryImage::class,
    );

    /**
     * @var array
     */
    private static $owns = [
        'Images',
    ];

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
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->dataFieldByName('Content')
                ->setRows(5);

            if ($this->ID) {
                $field = $fields->dataFieldByName('Images');
                $fields->removeByName('Images');

                $config = $field->getConfig();
                $config
                    ->addComponents([
                        new GridFieldOrderableRows('SortOrder')
                    ])
                    ->removeComponentsByType([
                        GridFieldAddExistingAutocompleter::class,
                        GridFieldDeleteAction::class
                    ]);
                if (class_exists(BulkUploader::class)) {
                    $config->addComponent(new BulkUploader());
                }
                $fields->addFieldToTab('Root.Main', $field);
            }
        });

        $fields = parent::getCMSFields();

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
