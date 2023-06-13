<?php

namespace Dynamic\Elements\Gallery\Model;

use Dynamic\BaseObject\Model\BaseElementObject;
use Dynamic\Elements\Gallery\Elements\ElementPhotoGallery;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\LiteralField;

/**
 * Class GalleryImage.
 */
class GalleryImage extends BaseElementObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Gallery Image';

    /**
     * @var string
     */
    private static $plural_name = 'Gallery Images';

    /**
     * @var array
     */
    private static $db = array(
        'SortOrder' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'PhotoGallery' => ElementPhotoGallery::class,
        // Image is covered by BaseElementObject
    );

    /**
     * @var array
     */
    private static $owns = array(
        'Image',
    );

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Summary' => 'Summary',
    );

    /**
     * @var array
     */
    private static $searchable_fields = array(
        'Title',
        'Content',
    );

    /**
     * @var string
     */
    private static $default_sort = 'SortOrder';

    /**
     * @var string
     */
    private static $table_name = 'GalleryImage';

    /**
     * @return FieldList
     *
     * @throws \Exception
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(array(
            'SortOrder',
            'PhotoGalleryID',
            'ElementLinkID',
        ));
        $image = $fields->dataFieldByName('Image')
            ->setFolderName('Uploads/Elements/PhotoGallery/');
        $fields->insertBefore('Content', $image);

        // so if anything depends on PageLink it doesn't flake out
        $fields->replaceField('PageLink', new LiteralField('PageLink', ''));

        return $fields;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->dbObject('Content')->Summary(20);
    }
}
