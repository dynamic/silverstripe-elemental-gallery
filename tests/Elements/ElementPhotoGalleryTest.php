<?php

namespace Dynamic\Elements\Gallery\Tests;

use Dynamic\Elements\Gallery\Elements\ElementPhotoGallery;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class ElementPhotoGallery.
 */
class ElementPhotoGalleryTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(ElementPhotoGallery::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = $this->objFromFixture(ElementPhotoGallery::class, 'one');
        $this->assertEquals($object->getType(), 'Photo Gallery');
    }
}
