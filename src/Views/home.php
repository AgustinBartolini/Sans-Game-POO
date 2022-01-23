<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Sans Game</title>
</head>

<body>
    <div class="buttons">
     <button id="start-btn"></button>
     <button id="restart-btn"></button>
     <div>
        <form>
            <fieldset>
              <legend>Select difficulty:</legend>
                <input type="radio" id="free" value="free" name="difficulty" checked>
                <label for="choice3">Free Mode</label>

                <input type="radio" id="easy" value="easy" name="difficulty">
                <label for="choice1">Easy</label>
          
                <input type="radio" id="medium" value="medium" name="difficulty">
                <label for="choice2">Medium</label>
          
                <input type="radio" id="hard" value="hard" name="difficulty">
                <label for="choice3">Hard</label>

                <input type="radio" id="sans" value="sans" name="difficulty">
                <label for="choice3">Sans Mode</label>
            </fieldset>
          </form>
     </div>
     <div class="sansContainer">
        <img class="sans" src="https://c.tenor.com/OOXMGRXFYSMAAAAM/undertale-sans.gif">
     </div>
    </div>

    <div id="game-table">
        <div class="pointer">
            <span id="title">SANS GAME</span>
            <div class="stats">
                <span id="points"></span>
                <span id="timeContainer"></span>
                <span id="neededPoints"></span>
            </div>
        </div>
        <div class="game container">
            <div id="player"></div>
        </div>
    </div>

    <form action="?action=store" method="post">
        <input type="hidden" name="user" id="user" required>
        <input type="hidden" name="score" id="score" required>
        <input type="submit" name="enviar" id="enviar">
    </form>

    <fieldset>
        <legend>Top Users:</legend>
        <div class="topContainer">
            <div class="topusers"></div>
            <div class="topscore"></div>
        </div>
    </fieldset>
</body>

<script src="./index.js"></script>
</html>