<?php

namespace Dynamic\Elements\Gallery\Elements;

use Colymba\BulkUpload\BulkUploader;
use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Gallery\Model\GalleryImage;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\ORM\FieldType\DBField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class ElementPhotoGallery.
 *
 * @method \SilverStripe\ORM\HasManyList|\Dynamic\Elements\Gallery\Model\GalleryImage[] Images()
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
     * @var array
     */
    private static $cascade_deletes = [
        'Images',
    ];

    /**
     * @var array
     */
    private static $cascade_duplicates = [
        'Images',
    ];

    /**
     * @var bool
     */
    private static $inline_editable = false;

    /**
     * @param bool $includerelations
     * @return array
     */
    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);

        $labels['Content'] = _t(__CLASS__.'.ContentLabel', 'Intro');
        $labels['Images'] = _t(__CLASS__ . '.ImagesLabel', 'Images');

        return $labels;
    }

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
                        GridFieldOrderableRows::create('SortOrder')
                    ])
                    ->removeComponentsByType([
                        GridFieldAddExistingAutocompleter::class,
                        GridFieldDeleteAction::class
                    ]);
                if (class_exists(BulkUploader::class)) {
                    $config->addComponent(new BulkUploader());
                    $config->getComponentByType(BulkUploader::class)
                        ->setUfSetup('setFolderName', 'Uploads/Elements/PhotoGallery/');
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
        $images = $this->Images();
        if ($images->count() == 1) {
            $label = ' image';
        } else {
            $label = ' images';
        }
        return DBField::create_field('HTMLText', $images->count() . ' ' . $label)->Summary(20);
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
