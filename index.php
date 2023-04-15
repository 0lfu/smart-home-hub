<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Home</title>
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="scripts/draggable.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="wrapper">
        <div id="menu">
            <div class="menu-item">
                <i class="fas fa-house"></i>
            </div>
            <div class="menu-item">
                <i class="fas fa-gear"></i>
            </div>
        </div>
        <div class="column" id="col1">
            <div class="component" id="clock">
                <div class="component-header">
                    <i class="fas fa-clock"></i> Clock
                </div>
                <div class="component-body">
                    <script src="components/clock/clock.js"></script>
                </div>
            </div>
            <div class="component" id="calendar">
                <div class="component-header">
                    <i class="fas fa-calendar"></i> Calendar
                </div>
                <div class="component-body">
                    <div class="calendar-header">
                      <div class="calendar-navigation">
                        <i class="fas fa-chevron-left" id="calendar-prev"></i>
                        <span class="calendar-current-date"></span>
                        <i class="fas fa-chevron-right" id="calendar-next"></i>
                      </div>
                    </div>
                  
                    <div class="calendar-body">
                      <ul class="calendar-weekdays">
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                        <li>Sun</li>
                      </ul>
                      <ul class="calendar-dates"></ul>
                    </div>
                  </div>
                  <script src="components/calendar/calendar.js"></script>
            </div>
            <div class="component" id="weather">
                <div class="component-header">
                    <span><i class="fas fa-cloud"></i> Weather</span>
                    <span><i class="fas fa-rotate-right"></i></span>
                </div>
                <div class="component-body">
                    <div id="current-weather">
                        <div id="weather-left"></div>
                        <div id="weather-right"></div>
                    </div>
                    <div id="later-weather"></div>
                    <?php include_once "components/weather/weather.php";?>
                </div>
            </div>
        </div>
        <div class="column" id="col2">
            <div class="component" id="todo">
                <div class="component-header">
                    <i class="fas fa-check"></i> TODO List
                </div>
                <div class="component-body">
                    <div id="items">
                        <ul>
                            <li draggable="true">Do my homework</li>
                            <li draggable="true">Make a dinner</li>
                            <li draggable="true">Go for a walk</li>
                        </ul>
                    </div>
                    <div id="input">
                        <input type="text" id="inputBox">
                        <div class="spacer"></div>
                        <div id="add">
                            <span class="fas fa-plus addButton"></span>
                        </div>
                    </div>
                </div>
                <script src="components/todo-list/todo.js"></script>
            </div>
            <div class="component" id="spotify">
                <div class="component-header">
                    <i class="fab fa-spotify"></i> <a href="spotify://">Spotify</a>
                </div>
                <div class="component-body">
                    <div id="cover"></div>
                    <div id="infoandcontrols">
                        <div id="info"></div>
                        <div id="controls">
                            <i class="fas fa-backward-step" id="previous"></i>
                            <i class="fas fa-play-pause" id="play-pause"></i>
                            <i class="fas fa-forward-step" id="next"></i>
                        </div>
                    </div>
                    <?php include_once 'components/spotify/spotify.php'; ?>
                </div>
            </div>
            <div class="component" id="lights">
                <div class="component-header">
                    <i class="fas fa-lightbulb"></i> Lights Controller
                </div>
                <div class="component-body">
                    <div id="light-switches">
                        <i class="fas fa-lightbulb-on allon" name="action" value="turn_on" data-command="switch_led" data-value="true"></i>
                        <i class="far fa-lightbulb-slash alloff" name="action" value="turn_off" data-command="switch_led" data-value="false"></i>
                    </div>
                    <div id="light-sliders">
                        <span><i class="fas fa-brightness brght"></i><input type="range" min="1" value="50" max="100" name="brightness" class="brightness-range"></span>
                        <span><i class="fas fa-temperature-half temp"></i><input type="range" min="1" value="50" max="100" name="temperature" class="temperature-range"></span>
                    </div>
                    <?php include_once 'components/lights/lights.php'; ?>
                </div>
            </div>
        </div>
        <div class="column" id="col3">
            <div class="component shortcut" id="shop">
                <div class="component-header">
                    <i class="fas fa-store"></i> Shopping Websites
                </div>
                <div class="component-body">
                    <div class="shortcut-item">
                        <a href="https://allegro.pl" target="_blank" style="background-image: url('https://meblujdom.pl/img/cms/thumbnails/46.jpg') ;"></a>
                        Allegro
                    </div>
                    <div class="shortcut-item">
                        <a href="https://olx.pl" target="_blank" style="background-image: url('https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://www.olx.pl&size=128') ;"></a>
                        OLX
                    </div>
                    <div class="shortcut-item">
                        <a href="https://pepper.pl" target="_blank" style="background-image: url('https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://www.pepper.pl&size=128') ;"></a>
                        Pepper
                    </div>
                    <div class="shortcut-item">
                        <a href="https://aliexpress.com" target="_blank" style="background-image: url('https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://www.aliexpress.com&size=128') ;"></a>
                        AliExpress
                    </div>
                </div>
            </div>
            <div class="component" id="shopping">
                <div class="component-header">
                    <i class="fas fa-cart-shopping"></i> Shopping List
                </div>
                <div class="component-body">
                    <div id="items">
                        <ul>
                            <li draggable="true">Milk</li>
                            <li draggable="true">10 Eggs</li>
                            <li draggable="true">Cucumber</li>
                        </ul>
                    </div>
                    <div id="input">
                        <input type="text" id="inputBox">
                        <div class="spacer"></div>
                        <div id="add">
                            <span class="fas fa-plus addButton"></span>
                        </div>
                    </div>
                </div>
                <script src="components/shopping-list/shopping.js"></script>
            </div>
        </div>
        <div class="column" id="col4">
            <div class="component" id="calculator">
                <div class="component-header">
                    <i class="fas fa-calculator"></i> Calculator
                </div>
                <div class="component-body">
                    <div id="output">0</div>
                    <div id="buttons">
                        <div class="calc-item special clear">C</div>
                        <div class="calc-item special">◀</div>
                        <div class="calc-item special">%</div>
                        <div class="calc-item special">÷</div>
                        <div class="calc-item">7</div>
                        <div class="calc-item">8</div>
                        <div class="calc-item">9</div>
                        <div class="calc-item special">×</div>
                        <div class="calc-item">4</div>
                        <div class="calc-item">5</div>
                        <div class="calc-item">6</div>
                        <div class="calc-item special">-</div>
                        <div class="calc-item">1</div>
                        <div class="calc-item">2</div>
                        <div class="calc-item">3</div>
                        <div class="calc-item special">+</div>
                        <div class="calc-item">0</div>
                        <div class="calc-item special">,</div>
                        <div class="calc-item special equal span-2">=</div>
                    </div>
                </div>
                <script src="components/calculator/calculator.js"></script>
            </div>
            <div class="component shortcut" id="video">
                <div class="component-header">
                    <i class="fas fa-video"></i> Video Websites
                </div>
                <div class="component-body">
                    <div class="shortcut-item">
                        <a href="https://youtube.com" target="_blank" style="background-image: url('https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://www.youtube.com&size=128') ;"></a>
                        YouTube
                    </div>
                    <div class="shortcut-item">
                        <a href="https://getsu.pl" target="_blank" style="background-image: url('https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://www.getsu.pl&size=128') ;"></a>
                        Getsu
                    </div>
                    <div class="shortcut-item">
                        <a href="https://cda.pl" target="_blank" style="background-image: url('https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://www.cda.pl&size=128') ;"></a>
                        CDA
                    </div>
                    <div class="shortcut-item">
                        <a href="https://docchi.pl" target="_blank" style="background-image: url('https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://docchi.pl&size=128') ;"></a>
                        Docchi
                    </div>
                </div>
            </div>
            <div class="component shortcut" id="gaming">
                <div class="component-header">
                    <i class="fas fa-gamepad"></i> Games
                </div>
                <div class="component-body">
                    <div class="shortcut-item">
                        <a href="steam://open/main" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Steam_icon_logo.svg/768px-Steam_icon_logo.svg.png') ;"></a>
                        Steam
                    </div>
                    <div class="shortcut-item">
                        <a href="steam://rungameid/1927780" style="background-image: url('https://yt3.googleusercontent.com/ytc/AL5GRJXpdVU_DHmdzjuWxuBGvBUY4-M8FyLr1rZOC6n8=s900-c-k-c0x00ffffff-no-rj') ;"></a>
                        Galaxy Life
                    </div>
                    <div class="shortcut-item">
                        <a href="steam://rungameid/431960" style="background-image: url('https://logopond.com/logos/69a67447d98f5d25ba6800cce2fd9a3d.png') ;"></a>
                        Wallpapers
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="VoiceInput">
        <div id="VoiceIOBox"></div>
        <i class="fas fa-microphone" id="voiceInputIcon"></i>
    </div>
    <script src="scripts/voice/commands.js"></script>
    <script src="scripts/voice/voice.js"></script>
</body>
</html>