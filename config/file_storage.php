<?php
use Aws\S3;
use Cake\Event\EventManager;
use Cake\Core\Configure;
use Burzum\FileStorage\Lib\FileStorageUtils;
use Burzum\FileStorage\Lib\StorageManager;
use Burzum\FileStorage\Event\ImageProcessingListener;
use Burzum\FileStorage\Event\LocalFileStorageListener;

// Attach the S3 Listener to the global CakeEventManager
//$listener = new S3StorageListener();
//EventManager::instance()->on($listener);
$listener = new LocalFileStorageListener();
EventManager::instance()->on($listener);

// Attach the Image Processing Listener to the global CakeEventManager
$listener = new ImageProcessingListener();
EventManager::instance()->on($listener);

Configure::write('FileStorage', array(
    // Configure image versions on a per model base
    'imageSizes' => array(
        'StudioImage' => array(
            'large' => array(
                'thumbnail' => array(
                    'mode' => 'inbound',
                    'width' => 555,
                    'height' => 415)),
            'medium' => array(
                'thumbnail' => array(
                    'mode' => 'inbound',
                    'width' => 360,
                    'height' => 250
                )
            ),
            'small' => array(
                'thumbnail' => array(
                    'mode' => 'inbound',
                    'width' => 262,
                    'height' => 157
                )
            )
        )
    )
));

// This is very important! The hashes are needed to calculate the image versions!
FileStorageUtils::generateHashes();

if (Configure::read('debug')) {
    StorageManager::config('Local', array(
            'adapterOptions' => array(WWW_ROOT, true),
            'adapterClass'   => '\Gaufrette\Adapter\Local',
            'class'          => '\Gaufrette\Filesystem'
        )
    );
} else {
    $S3Client = \Aws\S3\S3Client::factory(array(
        'key'    => Configure::read('S3.key'),
        'secret' => Configure::read('S3.secret')
    ));

    StorageManager::config('Local', array(
            'adapterOptions' => array(
                $S3Client,
                Configure::read('S3.bucket'),
                array(),
                true
            ),
            'cloudFrontUrl' => Configure::read('S3.cloudFrontUrl'),
            'adapterClass'  => '\Gaufrette\Adapter\AwsS3',
            'class'         => '\Gaufrette\Filesystem'
        )
    );
}
