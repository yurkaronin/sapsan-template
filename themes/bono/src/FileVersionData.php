<?php


namespace Wpshop\TheTheme;


class FileVersionData {

    /**
     * @var string
     */
    public $base_file;

    /**
     * @var string
     */
    public $base_version;

    /**
     * @var string
     */
    public $child_file;

    /**
     * @var string
     */
    public $child_version;

    /**
     * FileVersionData constructor.
     *
     * @param string $base_file
     */
    public function __construct( $base_file ) {
        $this->base_file = $base_file;
    }
}
