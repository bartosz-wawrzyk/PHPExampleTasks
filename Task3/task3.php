<?php
class RankingTable
{
    private $players = [];
    private $results = [];

    public function __construct($playerNames)
    {
        foreach ($playerNames as $playerName) {
            $this->players[] = $playerName;
            $this->results[$playerName] = 0;
        }
    }

    public function recordResult($playerName, $score)
    {
        if (!array_key_exists($playerName, $this->results)) {
            throw new Exception("Gracz '$playerName' nie istnieje w tabeli.");
        }

        $this->results[$playerName] += $score;
    }

    public function playerRank($rank)
    {
        arsort($this->results);

        $sortedPlayers = array_keys($this->results);
        $sortedScores = array_values($this->results);

        $count = count($sortedPlayers);

        $previousScore = $sortedScores[0];
        $previousGamesPlayed = $this->getGamesPlayed($sortedPlayers[0]);

        for ($i = 0; $i < $count; $i++) {
            $currentScore = $sortedScores[$i];
            $currentGamesPlayed = $this->getGamesPlayed($sortedPlayers[$i]);

            if ($currentScore == $previousScore && $currentGamesPlayed == $previousGamesPlayed) {
                continue;
            }

            $rank--;

            if ($rank == 0) {
                return $sortedPlayers[$i];
            }

            $previousScore = $currentScore;
            $previousGamesPlayed = $currentGamesPlayed;
        }

        return null;
    }

    private function getGamesPlayed($playerName)
    {
        $gamesPlayed = array_count_values($this->results);
        return $gamesPlayed[$this->results[$playerName]];
    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);

?>