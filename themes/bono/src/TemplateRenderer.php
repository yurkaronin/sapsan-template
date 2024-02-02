<?php

namespace Wpshop\TheTheme;

class TemplateRenderer {

    /**
     * @param string $file
     * @param array  $params
     * @param bool   $locate
     *
     * @return false|string
     * @throws \Exception
     */
    public function render( $file, $params = [], $locate = false ) {
        if ( $locate ) {
            $file = $this->locate_template( $file );
        } else {
            $file = TEMPLATEPATH . '/' . ltrim( $file, '\\/' );
        }

        return _bono_ob_get_content( function ( $__params__, $__file__ ) {
            extract( $__params__, EXTR_OVERWRITE );
            require $__file__;
        }, $params, $file );
    }

    /**
     * @param string $file
     *
     * @return string
     */
    public function locate_template( $file ) {
        $file = ltrim( $file, '/\\' );
        if ( file_exists( STYLESHEETPATH . '/' . $file ) ) {
            return STYLESHEETPATH . '/' . $file;
        }
        if ( file_exists( TEMPLATEPATH . '/' . $file ) ) {
            return TEMPLATEPATH . '/' . $file;
        }

        return $file;
    }
}
