<?php

namespace Warden\Patterns\Structural\Lightweight\RealWorld;

class Character
{
    public ?CharacterStyle $style = null;

    public function __construct(
        protected string $char
    )
    {
    }

    public function display(CharacterStyle $style): self
    {
        return $style->apply($this);
    }
}

class CharacterStyle
{
    public function __construct(
        public string $font,
        public int $size,
        public bool $isCursive,
        public bool $isBold
    )
    {
    }

    public function apply(Character $character): Character
    {
        $character->style = $this;

        return $character;
    }
}

class CharacterFactory
{
    /** @return array<Character> */
    public static function createFromString(string $text): array
    {
        $characters = [];

        foreach (str_split($text) as $character) {
            $characters[] = new Character($character);
        }

        return $characters;
    }
}

$comicSansStyle = new CharacterStyle(
    font: 'Comic Sans',
    size: 14,
    isCursive: false,
    isBold: true
);

$characters = CharacterFactory::createFromString('lorem ipsum');

var_dump(
    $characters[0]->display($comicSansStyle)->style === $characters[1]->display($comicSansStyle)->style
);