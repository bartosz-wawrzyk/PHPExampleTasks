<?php
class Thesaurus
{
    private $thesaurus;

    public function __construct($thesaurus)
    {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms($word)
    {
        if (array_key_exists($word, $this->thesaurus)) {
            $synonyms = $this->thesaurus[$word];
        } else {
            $synonyms = [];
        }

        $result = [
            'word' => $word,
            'synonyms' => $synonyms,
        ];

        return json_encode($result);
    }
}

// Example of use
$thesaurusData = array(
    "market" => array("trade"),
    "small" => array("little", "compact")
);

$thesaurus = new Thesaurus($thesaurusData);

echo $thesaurus->getSynonyms("small");
// It will display: {"word":"small","synonyms":["little","compact"]}

echo $thesaurus->getSynonyms("asleast");
// It will display: {"word":"asleast","synonyms":[]}

?>