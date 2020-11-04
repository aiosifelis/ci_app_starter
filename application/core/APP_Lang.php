<?php

class APP_Lang extends CI_Lang
{
    private $letters;

    public function __construct()
    {
        parent::__construct();
        $this->letters = array(
            'ά' =>'α',
            'έ' =>'ε',
            'ή' =>'η',
            'ί' =>'ι',
            'ό' =>'ο',
            'ύ' =>'υ',
            'ϋ' => 'υ',
            'ΰ' => 'ι',
            //'ϊ' => 'ι',
            'ΐ' => 'ι',
            'ώ' => 'ω',
            'Ά' => 'α',
            'Έ' => 'ε',
            'Ή' => 'η',
            'Ί' => 'ι',
            'Ό' => 'ο',
            'Ύ' => 'υ',
            'Ώ' => 'ω'

        );

        $this->slug_letters = array(
            'α' => 'a',
            'β' => 'b',
            'γ' => 'g',
            'δ' => 'd',
            'ε' => 'e',
            'ζ' => 'z',
            'η' => 'i',
            'θ' => 'th',
            'ι' => 'i',
            'κ' => 'k',
            'λ' => 'l',
            'μ' => 'm',
            'ν' => 'n',
            'ξ' => 'ks',
            'ο' => 'o',
            'π' => 'p',
            'ρ' => 'r',
            'σ' => 's',
            'τ' => 't',
            'υ' => 'u',
            'φ' => 'f',
            'χ' => 'x',
            'ψ' => 'ps',
            'ω' => 'o',
            'ς' => 's',
            'Α' => 'a',
            'Β' => 'b',
            'Γ' => 'g',
            'Δ' => 'd',
            'Ε' => 'e',
            'Ζ' => 'z',
            'Η' => 'i',
            'Θ' => 'th',
            'Ι' => 'i',
            'Κ' => 'k',
            'Λ' => 'l',
            'Μ' => 'm',
            'Ν' => 'n',
            'Ξ' => 'ks',
            'Ο' => 'o',
            'Π' => 'p',
            'Ρ' => 'r',
            'Σ' => 's',
            'Τ' => 't',
            'Υ' => 'u',
            'Φ' => 'f',
            'Χ' => 'x',
            'Ψ' => 'ps',
            'Ω' => 'o',
            'ά'=>'a',
            'έ'=>'e',
            'ή'=>'i',
            'ί'=>'i',
            'ό'=>'o',
            'ύ'=>'u',
            'ϋ'=> 'u',
            'ΰ' => 'u',
            'ϊ'=>'i',
            'ΐ'=>'i',
            'ώ' => 'o',
            'Ά' => 'a',
            'Έ' => 'e',
            'Ή' => 'i',
            'Ί' => 'i',
            'Ό' => 'o',
            'Ύ' => 'u',
            'Ϋ' => 'u',
            'Ϊ' => 'i',
            '.' => '',
            ',' => '',
            ';' => '',
            '' => '',
            '!' => '',
            '-' => '',
            '_' => '',
        );
    }

    public function trans($line = null, $uppercase = false)
    {
        $str = $this->line($line);
        if (empty($str)) {
            return $line;
        }
        if ($uppercase) {
            foreach ($this->letters as $source=>$dest) {
                $str = str_replace($source, $dest, $str);
            }
        }
        return $str;
    }

    public function slug($str = '', $delimeter = '-')
    {
        $str = str_replace(
            array_keys($this->slug_letters),
            array_values($this->slug_letters),
            $str
        );
        $str = str_replace(' ', $delimeter, $str);

        $str = strtolower($str);

        return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
    }
}
