# PHPExampleTasks

These are 4 php tasks

Task 1

As part of data processing, the implementation of the "make" method of the Pipeline class should be completed.
The "make" method should take a variable number of functions and return a new function that takes a
one parameter $arg.
The returned function should call the first function in "make" with the $arg parameter and call the second
function with the result of the first function.
The returned function should continue calling each function in "make" in order,
following the same pattern and return the value from the last function.
For example, calling make(function($var) { return $var * 3; }, function($var) { return $var + 1; },
function($var) { return $var / 2; }), and then calling the returned function with the argument 3
should return 5.

Task 2

The user interface contains two types of input controls: TextInput, which
accepts all text, and NumericInput, which accepts only numbers.
Implement the TextInput class, which includes:
The public method add($text) - which adds the specified text to the current value.
Public method getValue() - that returns the current value (string).
Implement the NumericInput class, which: Inherits from TextInput. Redefines the add method so,
so that any non-numeric text is ignored.

Task 3

The RankTable class keeps track of each player's score in the league. After each game, the player records his score using the
RecordResult() function.
A player's ranking in the league is calculated according to the following logic:
The player with the highest score is ranked first (rank 1). The player with the lowest
score is ranked last.
If two players have the same score, the player who has played fewer games is ranked higher.
If two players have the same score and have played the same number of games, the player who was first on the
list of players is ranked higher.
Implement the playerRank function, which returns the player with the given ranking.
$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);
All players have the same score. However, Maks and Monika have played fewer games than Jan, and since
Monika is in front of Maks in the list of players, he is ranked first. Therefore,
the above code should return "Monika".

Task 4

One type of dictionary, the thesaurus, contains words and their synonyms. Below is an example of
of a data structure that defines a thesaurus:
array("market" => array("trade"), "small" => array("little", "compact"))
Implement the getSynonyms function, which takes a word as a string and returns
all synonyms for that word in JSON format, as in the example below.
For example, calling $thesaurus->getSynonyms("small") should return:
'{"word": "small", "synonyms":["little", "compact"]}'
while a call with a word for which there are no synonyms, such as $thesaurus-.
>getSynonyms("asleast") should return:
'{"word":"asleast","synonyms":[]}'
