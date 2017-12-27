<?php
$config = array();
// CREST
$config["sso"] = array(
    "clientID" => "49449d5e62054911847ad7de9602abe7", // https://developers.eveonline.com/
    "secretKey" => "c5vZtlYjwDk7i8YpFwamGnuSPUrCheshpgkQhK6v",
    "callbackURL" => "http://auth.dboys.ml/auth/", // Include trailing / (Will be the url_to_the_index.com/auth/)
);
$config["discord"] = array(
    "botNick" => 'Keepstar', //Change the nickname of the auth bot here
    "guildId" => 395331857597857793, //Get the guild ID for your discord server
    "logChannel" => 0, //The channel ID for where you want the bot to report auth stuff (leave as 0 to disable)
    "enforceInGameName" => true, //Setting this to true will change players names to match their ingame name when they auth (this works retroactively)
    "addTicker" => false, //Setting this to true will add the corp ticker to the beginning of the users discord name
    "inviteLink" => "https://discord.gg/7AdvYzk", //Make sure it's set to never expire and set to a public channel.
    "botToken" => "Mzk1Mjc0OTI3MzYxNjIyMDI3.DSVCzw.A5ac36GrsO2Y8icePR2bdDwS7mw", //The bot must be a member of your server
    "clientId" => "395274927361622027", //The bot must be a member of your server
    "clientSecret" => "CCjcPppbqwpCeqqx8PMLHinjSuja7nlK", //The bot must be a member of your server
    "redirectUri" => "http://auth.dboys.ml/auth/" //The bot must be a member of your server (same as SSO callbackURL)
);
$config["groups"] = array(
    "DBOYS" => array(
        "id" => "98192683", // Corp/Alliance/Player ID
        "role" => "DBOYS" //Role Name
    ),
    "IFW" => array(
        "id" => "805828589", // Corp/Alliance/Player ID
        "role" => "IFW" //Role Name
    ),
);
// Site IGNORE EVERYTHING BELOW THIS LINE
$config["site"] = array(
    "debug" => true,
    "userAgent" => null, // Use pre-defined user agents
    "apiRequestsPrMinute" => 1800,
);
// Cookies
$config["cookies"] = array(
    "name" => "rena",
    "ssl" => true,
    "time" => (3600 * 24 * 30),
    "secret" => "",
);
// Slim
$config["slim"] = array(
    "mode" => $config["site"]["debug"] ? "development" : "production",
    "debug" => $config["site"]["debug"],
    "cookies.secret_key" => $config["cookies"]["secret"],
    "templates.path" => BASEDIR . "/view/",
);
