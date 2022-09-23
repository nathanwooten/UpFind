<?php

// The Unlicense, PUBLIC DOMAIN

if ( ! function_exists( 'upFind' ) ) {
function upFind( $directory, array $directoryContains )
{

  $is = [];

  while( $directory ) {

    if ( is_file( $directory ) ) {
      $directory = dirname( $directory ) . DIRECTORY_SEPARATOR;
    } else {
      $directory = rtrim( $directory, DIRECTORY_SEPARATOR ) . DIRECTORY_SEPARATOR;
    }

    foreach ( $directoryContains as $contains ) {
      $item = $directory . $contains;

      if ( is_readable( $item ) ) {
        $is[] = $item;
      }
    }

    if ( count( $is ) === count( $directoryContains ) ) {
      return $directory;
    }

    $parent = dirname( $directory );
    if ( $parent === $directory ) {
      $directory = false;
    } else {
      $directory = $parent;
    }
  }

  return $directory;

}
}
