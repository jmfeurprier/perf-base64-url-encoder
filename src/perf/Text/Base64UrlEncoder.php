<?php

namespace perf\Text;

/**
 *
 *
 */
class Base64UrlEncoder
{
    const TRIM = 1;

    /**
     *
     *
     * @var
     */
    private static $replacementsDefault = array(
        '+' => '-',
        '/' => '_',
    );

    /**
     *
     *
     * @var {string:string}
     */
    private $replacements;

    /**
     * Constructor.
     *
     * @param null|{string:string} $replacements
     */
    public function __construct(array $replacements = null)
    {
        if (null === $replacements) {
            $replacements = self::$replacementsDefault;
        }

        $this->replacements = $replacements;
    }

    /**
     *
     *
     * @param string $string
     * @param ing    $flags
     * @return string
     */
    public function encode($string, $flags = 0)
    {
        $encoded = base64_encode($string);

        if ($flags && self::TRIM) {
            $encoded = rtrim($encoded, '=');
        }

        return str_replace(
            array_keys($this->replacements),
            array_values($this->replacements),
            $encoded
        );
    }

    /**
     *
     *
     * @param string $string
     * @return string
     */
    public function decode($string)
    {
        return base64_decode(
            str_replace(
                array_keys($this->replacements),
                array_values($this->replacements),
                $string
            )
        );
    }
}
