<?php
    require ("connect.php");
    require_once ("create_table.php");
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="assets/style.css" />
    <!-- Vue JS -->
    <script src="https://unpkg.com/vue@next"></script>

    <title>Offline events</title>
</head>

<body id="app">
    <div class="uk-child-width-1-3@s uk-grid-match" uk-grid>
        <div v-for="(item, idx) in eventName">
            <div :id="toggles[idx]" class="uk-card uk-card-hover uk-card-body uk-width-1-2@m">
                <h3 class="uk-card-title">{{ item[0] }} {{ item[1] }}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    <br>
                    <a>Read more</a>
                <div uk-drop="mode: click">
                    <div class="uk-card uk-card-body uk-card-default">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit, sed do
                        eiusmod tempor incididunt.</div>
                </div>
                </p>
            <div class="tutor"><span uk-icon="user"></span>Kris Kirby</div>
            <div class="btn">
                 <button class="uk-button uk-button-default" @click="addEvent(item, idx)" type="button">I choose</button>
            </div>           
            </div>    
        </div>
    </div>
        
    <hr>
    <section class="uk-child-width-expand@s" uk-grid>
    <div class="active-events uk-margin-left">
        <p>Please choose the session above</p>
        <p>Events in list: {{events.length}}</p>
        <p>Total: {{ totalCounter() }}</p>
        <ul class="uk-list uk-list-striped">
            <li v-for="(myEvent, idx) in events"> {{ myEvent[0] }}  {{ myEvent[1] }} <span class="span">|</span> {{ price=300 }} грн| <button @click="deleteEvent(idx)" class="uk-button uk-button-danger">Delete</button></li>
        </ul>
    </div>
    <form method="POST" action="payment.php" class="uk-margin-auto">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend">Personal information</legend>
    
            <div class="uk-margin uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input name = "f_name" required  class="uk-input" type="text" placeholder="Name">
            </div>
    
            <div class="uk-margin uk-inline">
                <span class="uk-form-icon" uk-icon="icon: users"></span>
                <input name = "l_name" required  class="uk-input" type="text" placeholder="Last name">
            </div>
            <div class="uk-margin uk-inline">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input name = "email" required  class="uk-input" type="email" placeholder="Email">
            </div>
            <div class="uk-margin uk-inline">
                <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                <input name = "phone" required class="uk-input" type="number" placeholder="Phone">
            </div>
            <input type="hidden" name="total" :value="totalCounter()"> 
            <input type="hidden" name="event_id" :value="getEventId()">
            <input type="hidden" name="event_list" :value="getEventList()">
            <div class="div">
                <label><input name="agree" required class="uk-checkbox" type="checkbox"> By clicking this I agree and accept</label>
            </div>
            
            <div class="uk-margin-small"><a href="#modal-overflow" uk-toggle>Public Terms</a></div>
            
        </fieldset>
        <button name="sign_in" class="uk-button uk-button-primary uk-margin-auto" type="submit">Register and Pay</button>
    </form>
    </section>
    
    <!-- Modal -->
    <div id="modal-overflow" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Headline</h2>
            </div>
            <div class="uk-modal-body" uk-overflow-auto>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button">Save</button>
            </div>
        </div>
    </div>



    <script src="assets/main.js"></script>



    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit-icons.min.js"></script>
</body>

</html>