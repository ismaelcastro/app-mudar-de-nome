<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Divórcio</title>
    <style>
        /*!
        * Bootstrap v3.3.0 (http://getbootstrap.com)
        * Copyright 2011-2014 Twitter, Inc.
        * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
        */

        /*! normalize.css v3.0.2 | MIT License | git.io/normalize */
        html {
        font-family: sans-serif;
        -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        body {
        margin: 0;
        }
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
        display: block;
        }
        audio,
        canvas,
        progress,
        video {
        display: inline-block;
        vertical-align: baseline;
        }
        audio:not([controls]) {
        display: none;
        height: 0;
        }
        [hidden],
        template {
        display: none;
        }
        a {
        background-color: transparent;
        }
        a:active,
        a:hover {
        outline: 0;
        }
        abbr[title] {
        border-bottom: 1px dotted;
        }
        b,
        strong {
        font-weight: bold;
        }
        dfn {
        font-style: italic;
        }
        h1 {
        margin: .67em 0;
        font-size: 2em;
        }
        mark {
        color: #000;
        background: #ff0;
        }
        small {
        font-size: 80%;
        }
        sub,
        sup {
        position: relative;
        font-size: 75%;
        line-height: 0;
        vertical-align: baseline;
        }
        sup {
        top: -.5em;
        }
        sub {
        bottom: -.25em;
        }
        img {
        border: 0;
        }
        svg:not(:root) {
        overflow: hidden;
        }
        figure {
        margin: 1em 40px;
        }
        hr {
        height: 0;
        -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
                box-sizing: content-box;
        }
        pre {
        overflow: auto;
        }
        code,
        kbd,
        pre,
        samp {
        font-family: monospace, monospace;
        font-size: 1em;
        }
        button,
        input,
        optgroup,
        select,
        textarea {
        margin: 0;
        font: inherit;
        color: inherit;
        }
        button {
        overflow: visible;
        }
        button,
        select {
        text-transform: none;
        }
        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"] {
        -webkit-appearance: button;
        cursor: pointer;
        }
        button[disabled],
        html input[disabled] {
        cursor: default;
        }
        button::-moz-focus-inner,
        input::-moz-focus-inner {
        padding: 0;
        border: 0;
        }
        input {
        line-height: normal;
        }
        input[type="checkbox"],
        input[type="radio"] {
        -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 0;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
        height: auto;
        }
        input[type="search"] {
        -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
                box-sizing: content-box;
        -webkit-appearance: textfield;
        }
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-decoration {
        -webkit-appearance: none;
        }
        fieldset {
        padding: .35em .625em .75em;
        margin: 0 2px;
        border: 1px solid #c0c0c0;
        }
        legend {
        padding: 0;
        border: 0;
        }
        textarea {
        overflow: auto;
        }
        optgroup {
        font-weight: bold;
        }
        table {
        border-spacing: 0;
        border-collapse: collapse;
        }
        td,
        th {
        padding: 0;
        }
        /*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
        @media print {
        *,
        *:before,
        *:after {
            color: #000 !important;
            text-shadow: none !important;
            background: transparent !important;
            -webkit-box-shadow: none !important;
                    box-shadow: none !important;
        }
        a,
        a:visited {
            text-decoration: underline;
        }
        a[href]:after {
            content: " (" attr(href) ")";
        }
        abbr[title]:after {
            content: " (" attr(title) ")";
        }
        a[href^="#"]:after,
        a[href^="javascript:"]:after {
            content: "";
        }
        pre,
        blockquote {
            border: 1px solid #999;

            page-break-inside: avoid;
        }
        thead {
            display: table-header-group;
        }
        tr,
        img {
            page-break-inside: avoid;
        }
        img {
            max-width: 100% !important;
        }
        p,
        h2,
        h3 {
            orphans: 3;
            widows: 3;
        }
        h2,
        h3 {
            page-break-after: avoid;
        }
        select {
            background: #fff !important;
        }
        .navbar {
            display: none;
        }
        .btn > .caret,
        .dropup > .btn > .caret {
            border-top-color: #000 !important;
        }
        .label {
            border: 1px solid #000;
        }
        .table {
            border-collapse: collapse !important;
        }
        .table td,
        .table th {
            background-color: #fff !important;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }
        }
        @font-face {
        font-family: 'Glyphicons Halflings';

        src: url('../fonts/glyphicons-halflings-regular.eot');
        src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
        }
        .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        font-style: normal;
        font-weight: normal;
        line-height: 1;

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        }
        .glyphicon-asterisk:before {
        content: "\2a";
        }
        .glyphicon-plus:before {
        content: "\2b";
        }
        .glyphicon-euro:before,
        .glyphicon-eur:before {
        content: "\20ac";
        }
        .glyphicon-minus:before {
        content: "\2212";
        }
        .glyphicon-cloud:before {
        content: "\2601";
        }
        .glyphicon-envelope:before {
        content: "\2709";
        }
        .glyphicon-pencil:before {
        content: "\270f";
        }
        .glyphicon-glass:before {
        content: "\e001";
        }
        .glyphicon-music:before {
        content: "\e002";
        }
        .glyphicon-search:before {
        content: "\e003";
        }
        .glyphicon-heart:before {
        content: "\e005";
        }
        .glyphicon-star:before {
        content: "\e006";
        }
        .glyphicon-star-empty:before {
        content: "\e007";
        }
        .glyphicon-user:before {
        content: "\e008";
        }
        .glyphicon-film:before {
        content: "\e009";
        }
        .glyphicon-th-large:before {
        content: "\e010";
        }
        .glyphicon-th:before {
        content: "\e011";
        }
        .glyphicon-th-list:before {
        content: "\e012";
        }
        .glyphicon-ok:before {
        content: "\e013";
        }
        .glyphicon-remove:before {
        content: "\e014";
        }
        .glyphicon-zoom-in:before {
        content: "\e015";
        }
        .glyphicon-zoom-out:before {
        content: "\e016";
        }
        .glyphicon-off:before {
        content: "\e017";
        }
        .glyphicon-signal:before {
        content: "\e018";
        }
        .glyphicon-cog:before {
        content: "\e019";
        }
        .glyphicon-trash:before {
        content: "\e020";
        }
        .glyphicon-home:before {
        content: "\e021";
        }
        .glyphicon-file:before {
        content: "\e022";
        }
        .glyphicon-time:before {
        content: "\e023";
        }
        .glyphicon-road:before {
        content: "\e024";
        }
        .glyphicon-download-alt:before {
        content: "\e025";
        }
        .glyphicon-download:before {
        content: "\e026";
        }
        .glyphicon-upload:before {
        content: "\e027";
        }
        .glyphicon-inbox:before {
        content: "\e028";
        }
        .glyphicon-play-circle:before {
        content: "\e029";
        }
        .glyphicon-repeat:before {
        content: "\e030";
        }
        .glyphicon-refresh:before {
        content: "\e031";
        }
        .glyphicon-list-alt:before {
        content: "\e032";
        }
        .glyphicon-lock:before {
        content: "\e033";
        }
        .glyphicon-flag:before {
        content: "\e034";
        }
        .glyphicon-headphones:before {
        content: "\e035";
        }
        .glyphicon-volume-off:before {
        content: "\e036";
        }
        .glyphicon-volume-down:before {
        content: "\e037";
        }
        .glyphicon-volume-up:before {
        content: "\e038";
        }
        .glyphicon-qrcode:before {
        content: "\e039";
        }
        .glyphicon-barcode:before {
        content: "\e040";
        }
        .glyphicon-tag:before {
        content: "\e041";
        }
        .glyphicon-tags:before {
        content: "\e042";
        }
        .glyphicon-book:before {
        content: "\e043";
        }
        .glyphicon-bookmark:before {
        content: "\e044";
        }
        .glyphicon-print:before {
        content: "\e045";
        }
        .glyphicon-camera:before {
        content: "\e046";
        }
        .glyphicon-font:before {
        content: "\e047";
        }
        .glyphicon-bold:before {
        content: "\e048";
        }
        .glyphicon-italic:before {
        content: "\e049";
        }
        .glyphicon-text-height:before {
        content: "\e050";
        }
        .glyphicon-text-width:before {
        content: "\e051";
        }
        .glyphicon-align-left:before {
        content: "\e052";
        }
        .glyphicon-align-center:before {
        content: "\e053";
        }
        .glyphicon-align-right:before {
        content: "\e054";
        }
        .glyphicon-align-justify:before {
        content: "\e055";
        }
        .glyphicon-list:before {
        content: "\e056";
        }
        .glyphicon-indent-left:before {
        content: "\e057";
        }
        .glyphicon-indent-right:before {
        content: "\e058";
        }
        .glyphicon-facetime-video:before {
        content: "\e059";
        }
        .glyphicon-picture:before {
        content: "\e060";
        }
        .glyphicon-map-marker:before {
        content: "\e062";
        }
        .glyphicon-adjust:before {
        content: "\e063";
        }
        .glyphicon-tint:before {
        content: "\e064";
        }
        .glyphicon-edit:before {
        content: "\e065";
        }
        .glyphicon-share:before {
        content: "\e066";
        }
        .glyphicon-check:before {
        content: "\e067";
        }
        .glyphicon-move:before {
        content: "\e068";
        }
        .glyphicon-step-backward:before {
        content: "\e069";
        }
        .glyphicon-fast-backward:before {
        content: "\e070";
        }
        .glyphicon-backward:before {
        content: "\e071";
        }
        .glyphicon-play:before {
        content: "\e072";
        }
        .glyphicon-pause:before {
        content: "\e073";
        }
        .glyphicon-stop:before {
        content: "\e074";
        }
        .glyphicon-forward:before {
        content: "\e075";
        }
        .glyphicon-fast-forward:before {
        content: "\e076";
        }
        .glyphicon-step-forward:before {
        content: "\e077";
        }
        .glyphicon-eject:before {
        content: "\e078";
        }
        .glyphicon-chevron-left:before {
        content: "\e079";
        }
        .glyphicon-chevron-right:before {
        content: "\e080";
        }
        .glyphicon-plus-sign:before {
        content: "\e081";
        }
        .glyphicon-minus-sign:before {
        content: "\e082";
        }
        .glyphicon-remove-sign:before {
        content: "\e083";
        }
        .glyphicon-ok-sign:before {
        content: "\e084";
        }
        .glyphicon-question-sign:before {
        content: "\e085";
        }
        .glyphicon-info-sign:before {
        content: "\e086";
        }
        .glyphicon-screenshot:before {
        content: "\e087";
        }
        .glyphicon-remove-circle:before {
        content: "\e088";
        }
        .glyphicon-ok-circle:before {
        content: "\e089";
        }
        .glyphicon-ban-circle:before {
        content: "\e090";
        }
        .glyphicon-arrow-left:before {
        content: "\e091";
        }
        .glyphicon-arrow-right:before {
        content: "\e092";
        }
        .glyphicon-arrow-up:before {
        content: "\e093";
        }
        .glyphicon-arrow-down:before {
        content: "\e094";
        }
        .glyphicon-share-alt:before {
        content: "\e095";
        }
        .glyphicon-resize-full:before {
        content: "\e096";
        }
        .glyphicon-resize-small:before {
        content: "\e097";
        }
        .glyphicon-exclamation-sign:before {
        content: "\e101";
        }
        .glyphicon-gift:before {
        content: "\e102";
        }
        .glyphicon-leaf:before {
        content: "\e103";
        }
        .glyphicon-fire:before {
        content: "\e104";
        }
        .glyphicon-eye-open:before {
        content: "\e105";
        }
        .glyphicon-eye-close:before {
        content: "\e106";
        }
        .glyphicon-warning-sign:before {
        content: "\e107";
        }
        .glyphicon-plane:before {
        content: "\e108";
        }
        .glyphicon-calendar:before {
        content: "\e109";
        }
        .glyphicon-random:before {
        content: "\e110";
        }
        .glyphicon-comment:before {
        content: "\e111";
        }
        .glyphicon-magnet:before {
        content: "\e112";
        }
        .glyphicon-chevron-up:before {
        content: "\e113";
        }
        .glyphicon-chevron-down:before {
        content: "\e114";
        }
        .glyphicon-retweet:before {
        content: "\e115";
        }
        .glyphicon-shopping-cart:before {
        content: "\e116";
        }
        .glyphicon-folder-close:before {
        content: "\e117";
        }
        .glyphicon-folder-open:before {
        content: "\e118";
        }
        .glyphicon-resize-vertical:before {
        content: "\e119";
        }
        .glyphicon-resize-horizontal:before {
        content: "\e120";
        }
        .glyphicon-hdd:before {
        content: "\e121";
        }
        .glyphicon-bullhorn:before {
        content: "\e122";
        }
        .glyphicon-bell:before {
        content: "\e123";
        }
        .glyphicon-certificate:before {
        content: "\e124";
        }
        .glyphicon-thumbs-up:before {
        content: "\e125";
        }
        .glyphicon-thumbs-down:before {
        content: "\e126";
        }
        .glyphicon-hand-right:before {
        content: "\e127";
        }
        .glyphicon-hand-left:before {
        content: "\e128";
        }
        .glyphicon-hand-up:before {
        content: "\e129";
        }
        .glyphicon-hand-down:before {
        content: "\e130";
        }
        .glyphicon-circle-arrow-right:before {
        content: "\e131";
        }
        .glyphicon-circle-arrow-left:before {
        content: "\e132";
        }
        .glyphicon-circle-arrow-up:before {
        content: "\e133";
        }
        .glyphicon-circle-arrow-down:before {
        content: "\e134";
        }
        .glyphicon-globe:before {
        content: "\e135";
        }
        .glyphicon-wrench:before {
        content: "\e136";
        }
        .glyphicon-tasks:before {
        content: "\e137";
        }
        .glyphicon-filter:before {
        content: "\e138";
        }
        .glyphicon-briefcase:before {
        content: "\e139";
        }
        .glyphicon-fullscreen:before {
        content: "\e140";
        }
        .glyphicon-dashboard:before {
        content: "\e141";
        }
        .glyphicon-paperclip:before {
        content: "\e142";
        }
        .glyphicon-heart-empty:before {
        content: "\e143";
        }
        .glyphicon-link:before {
        content: "\e144";
        }
        .glyphicon-phone:before {
        content: "\e145";
        }
        .glyphicon-pushpin:before {
        content: "\e146";
        }
        .glyphicon-usd:before {
        content: "\e148";
        }
        .glyphicon-gbp:before {
        content: "\e149";
        }
        .glyphicon-sort:before {
        content: "\e150";
        }
        .glyphicon-sort-by-alphabet:before {
        content: "\e151";
        }
        .glyphicon-sort-by-alphabet-alt:before {
        content: "\e152";
        }
        .glyphicon-sort-by-order:before {
        content: "\e153";
        }
        .glyphicon-sort-by-order-alt:before {
        content: "\e154";
        }
        .glyphicon-sort-by-attributes:before {
        content: "\e155";
        }
        .glyphicon-sort-by-attributes-alt:before {
        content: "\e156";
        }
        .glyphicon-unchecked:before {
        content: "\e157";
        }
        .glyphicon-expand:before {
        content: "\e158";
        }
        .glyphicon-collapse-down:before {
        content: "\e159";
        }
        .glyphicon-collapse-up:before {
        content: "\e160";
        }
        .glyphicon-log-in:before {
        content: "\e161";
        }
        .glyphicon-flash:before {
        content: "\e162";
        }
        .glyphicon-log-out:before {
        content: "\e163";
        }
        .glyphicon-new-window:before {
        content: "\e164";
        }
        .glyphicon-record:before {
        content: "\e165";
        }
        .glyphicon-save:before {
        content: "\e166";
        }
        .glyphicon-open:before {
        content: "\e167";
        }
        .glyphicon-saved:before {
        content: "\e168";
        }
        .glyphicon-import:before {
        content: "\e169";
        }
        .glyphicon-export:before {
        content: "\e170";
        }
        .glyphicon-send:before {
        content: "\e171";
        }
        .glyphicon-floppy-disk:before {
        content: "\e172";
        }
        .glyphicon-floppy-saved:before {
        content: "\e173";
        }
        .glyphicon-floppy-remove:before {
        content: "\e174";
        }
        .glyphicon-floppy-save:before {
        content: "\e175";
        }
        .glyphicon-floppy-open:before {
        content: "\e176";
        }
        .glyphicon-credit-card:before {
        content: "\e177";
        }
        .glyphicon-transfer:before {
        content: "\e178";
        }
        .glyphicon-cutlery:before {
        content: "\e179";
        }
        .glyphicon-header:before {
        content: "\e180";
        }
        .glyphicon-compressed:before {
        content: "\e181";
        }
        .glyphicon-earphone:before {
        content: "\e182";
        }
        .glyphicon-phone-alt:before {
        content: "\e183";
        }
        .glyphicon-tower:before {
        content: "\e184";
        }
        .glyphicon-stats:before {
        content: "\e185";
        }
        .glyphicon-sd-video:before {
        content: "\e186";
        }
        .glyphicon-hd-video:before {
        content: "\e187";
        }
        .glyphicon-subtitles:before {
        content: "\e188";
        }
        .glyphicon-sound-stereo:before {
        content: "\e189";
        }
        .glyphicon-sound-dolby:before {
        content: "\e190";
        }
        .glyphicon-sound-5-1:before {
        content: "\e191";
        }
        .glyphicon-sound-6-1:before {
        content: "\e192";
        }
        .glyphicon-sound-7-1:before {
        content: "\e193";
        }
        .glyphicon-copyright-mark:before {
        content: "\e194";
        }
        .glyphicon-registration-mark:before {
        content: "\e195";
        }
        .glyphicon-cloud-download:before {
        content: "\e197";
        }
        .glyphicon-cloud-upload:before {
        content: "\e198";
        }
        .glyphicon-tree-conifer:before {
        content: "\e199";
        }
        .glyphicon-tree-deciduous:before {
        content: "\e200";
        }
        * {
        -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
                box-sizing: border-box;
        }
        *:before,
        *:after {
        -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
                box-sizing: border-box;
        }
        html {
        font-size: 10px;

        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #333;
        background-color: #fff;
        }
        input,
        button,
        select,
        textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        }
        a {
        color: #428bca;
        text-decoration: none;
        }
        a:hover,
        a:focus {
        color: #2a6496;
        text-decoration: underline;
        }
        a:focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
        }
        figure {
        margin: 0;
        }
        img {
        vertical-align: middle;
        }
        .img-responsive,
        .thumbnail > img,
        .thumbnail a > img,
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
        display: block;
        max-width: 100%;
        height: auto;
        }
        .img-rounded {
        border-radius: 6px;
        }
        .img-thumbnail {
        display: inline-block;
        max-width: 100%;
        height: auto;
        padding: 4px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
                transition: all .2s ease-in-out;
        }
        .img-circle {
        border-radius: 50%;
        }
        hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #eee;
        }
        .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        }
        .sr-only-focusable:active,
        .sr-only-focusable:focus {
        position: static;
        width: auto;
        height: auto;
        margin: 0;
        overflow: visible;
        clip: auto;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
        }
        h1 small,
        h2 small,
        h3 small,
        h4 small,
        h5 small,
        h6 small,
        .h1 small,
        .h2 small,
        .h3 small,
        .h4 small,
        .h5 small,
        .h6 small,
        h1 .small,
        h2 .small,
        h3 .small,
        h4 .small,
        h5 .small,
        h6 .small,
        .h1 .small,
        .h2 .small,
        .h3 .small,
        .h4 .small,
        .h5 .small,
        .h6 .small {
        font-weight: normal;
        line-height: 1;
        color: #777;
        }
        h1,
        .h1,
        h2,
        .h2,
        h3,
        .h3 {
        margin-top: 20px;
        margin-bottom: 10px;
        }
        h1 small,
        .h1 small,
        h2 small,
        .h2 small,
        h3 small,
        .h3 small,
        h1 .small,
        .h1 .small,
        h2 .small,
        .h2 .small,
        h3 .small,
        .h3 .small {
        font-size: 65%;
        }
        h4,
        .h4,
        h5,
        .h5,
        h6,
        .h6 {
        margin-top: 10px;
        margin-bottom: 10px;
        }
        h4 small,
        .h4 small,
        h5 small,
        .h5 small,
        h6 small,
        .h6 small,
        h4 .small,
        .h4 .small,
        h5 .small,
        .h5 .small,
        h6 .small,
        .h6 .small {
        font-size: 75%;
        }
        h1,
        .h1 {
        font-size: 36px;
        }
        h2,
        .h2 {
        font-size: 30px;
        }
        h3,
        .h3 {
        font-size: 24px;
        }
        h4,
        .h4 {
        font-size: 18px;
        }
        h5,
        .h5 {
        font-size: 14px;
        }
        h6,
        .h6 {
        font-size: 12px;
        }
        p {
        margin: 0 0 10px;
        }
        .lead {
        margin-bottom: 20px;
        font-size: 16px;
        font-weight: 300;
        line-height: 1.4;
        }
        @media (min-width: 768px) {
        .lead {
            font-size: 21px;
        }
        }
        small,
        .small {
        font-size: 85%;
        }
        mark,
        .mark {
        padding: .2em;
        background-color: #fcf8e3;
        }
        .text-left {
        text-align: left;
        }
        .text-right {
        text-align: right;
        }
        .text-center {
        text-align: center;
        }
        .text-justify {
        text-align: justify;
        }
        .text-nowrap {
        white-space: nowrap;
        }
        .text-lowercase {
        text-transform: lowercase;
        }
        .text-uppercase {
        text-transform: uppercase;
        }
        .text-capitalize {
        text-transform: capitalize;
        }
        .text-muted {
        color: #777;
        }
        .text-primary {
        color: #428bca;
        }
        a.text-primary:hover {
        color: #3071a9;
        }
        .text-success {
        color: #3c763d;
        }
        a.text-success:hover {
        color: #2b542c;
        }
        .text-info {
        color: #31708f;
        }
        a.text-info:hover {
        color: #245269;
        }
        .text-warning {
        color: #8a6d3b;
        }
        a.text-warning:hover {
        color: #66512c;
        }
        .text-danger {
        color: #a94442;
        }
        a.text-danger:hover {
        color: #843534;
        }
        .bg-primary {
        color: #fff;
        background-color: #428bca;
        }
        a.bg-primary:hover {
        background-color: #3071a9;
        }
        .bg-success {
        background-color: #dff0d8;
        }
        a.bg-success:hover {
        background-color: #c1e2b3;
        }
        .bg-info {
        background-color: #d9edf7;
        }
        a.bg-info:hover {
        background-color: #afd9ee;
        }
        .bg-warning {
        background-color: #fcf8e3;
        }
        a.bg-warning:hover {
        background-color: #f7ecb5;
        }
        .bg-danger {
        background-color: #f2dede;
        }
        a.bg-danger:hover {
        background-color: #e4b9b9;
        }
        .page-header {
        padding-bottom: 9px;
        margin: 40px 0 20px;
        border-bottom: 1px solid #eee;
        }
        ul,
        ol {
        margin-top: 0;
        margin-bottom: 10px;
        }
        ul ul,
        ol ul,
        ul ol,
        ol ol {
        margin-bottom: 0;
        }
        .list-unstyled {
        padding-left: 0;
        list-style: none;
        }
        .list-inline {
        padding-left: 0;
        margin-left: -5px;
        list-style: none;
        }
        .list-inline > li {
        display: inline-block;
        padding-right: 5px;
        padding-left: 5px;
        }
        dl {
        margin-top: 0;
        margin-bottom: 20px;
        }
        dt,
        dd {
        line-height: 1.42857143;
        }
        dt {
        font-weight: bold;
        }
        dd {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        .dl-horizontal dt {
            float: left;
            width: 160px;
            overflow: hidden;
            clear: left;
            text-align: right;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .dl-horizontal dd {
            margin-left: 180px;
        }
        }
        abbr[title],
        abbr[data-original-title] {
        cursor: help;
        border-bottom: 1px dotted #777;
        }
        .initialism {
        font-size: 90%;
        text-transform: uppercase;
        }
        blockquote {
        padding: 10px 20px;
        margin: 0 0 20px;
        font-size: 17.5px;
        border-left: 5px solid #eee;
        }
        blockquote p:last-child,
        blockquote ul:last-child,
        blockquote ol:last-child {
        margin-bottom: 0;
        }
        blockquote footer,
        blockquote small,
        blockquote .small {
        display: block;
        font-size: 80%;
        line-height: 1.42857143;
        color: #777;
        }
        blockquote footer:before,
        blockquote small:before,
        blockquote .small:before {
        content: '\2014 \00A0';
        }
        .blockquote-reverse,
        blockquote.pull-right {
        padding-right: 15px;
        padding-left: 0;
        text-align: right;
        border-right: 5px solid #eee;
        border-left: 0;
        }
        .blockquote-reverse footer:before,
        blockquote.pull-right footer:before,
        .blockquote-reverse small:before,
        blockquote.pull-right small:before,
        .blockquote-reverse .small:before,
        blockquote.pull-right .small:before {
        content: '';
        }
        .blockquote-reverse footer:after,
        blockquote.pull-right footer:after,
        .blockquote-reverse small:after,
        blockquote.pull-right small:after,
        .blockquote-reverse .small:after,
        blockquote.pull-right .small:after {
        content: '\00A0 \2014';
        }
        address {
        margin-bottom: 20px;
        font-style: normal;
        line-height: 1.42857143;
        }
        code,
        kbd,
        pre,
        samp {
        font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
        }
        code {
        padding: 2px 4px;
        font-size: 90%;
        color: #c7254e;
        background-color: #f9f2f4;
        border-radius: 4px;
        }
        kbd {
        padding: 2px 4px;
        font-size: 90%;
        color: #fff;
        background-color: #333;
        border-radius: 3px;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
                box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
        }
        kbd kbd {
        padding: 0;
        font-size: 100%;
        font-weight: bold;
        -webkit-box-shadow: none;
                box-shadow: none;
        }
        pre {
        display: block;
        padding: 9.5px;
        margin: 0 0 10px;
        font-size: 13px;
        line-height: 1.42857143;
        color: #333;
        word-break: break-all;
        word-wrap: break-word;
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        border-radius: 4px;
        }
        pre code {
        padding: 0;
        font-size: inherit;
        color: inherit;
        white-space: pre-wrap;
        background-color: transparent;
        border-radius: 0;
        }
        .pre-scrollable {
        max-height: 340px;
        overflow-y: scroll;
        }
        .container {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        }
        @media (min-width: 768px) {
        .container {
            width: 750px;
        }
        }
        @media (min-width: 992px) {
        .container {
            width: 970px;
        }
        }
        @media (min-width: 768px) {
        .container {
            width: 800px;
        }
        }
        .container-fluid {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        }
        .row {
        margin-right: -15px;
        margin-left: -15px;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
        }
        .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
        float: left;
        }
        .col-xs-12 {
        width: 100%;
        }
        .col-xs-11 {
        width: 91.66666667%;
        }
        .col-xs-10 {
        width: 83.33333333%;
        }
        .col-xs-9 {
        width: 75%;
        }
        .col-xs-8 {
        width: 66.66666667%;
        }
        .col-xs-7 {
        width: 58.33333333%;
        }
        .col-xs-6 {
        width: 50%;
        }
        .col-xs-5 {
        width: 41.66666667%;
        }
        .col-xs-4 {
        width: 33.33333333%;
        }
        .col-xs-3 {
        width: 25%;
        }
        .col-xs-2 {
        width: 16.66666667%;
        }
        .col-xs-1 {
        width: 8.33333333%;
        }
        .col-xs-pull-12 {
        right: 100%;
        }
        .col-xs-pull-11 {
        right: 91.66666667%;
        }
        .col-xs-pull-10 {
        right: 83.33333333%;
        }
        .col-xs-pull-9 {
        right: 75%;
        }
        .col-xs-pull-8 {
        right: 66.66666667%;
        }
        .col-xs-pull-7 {
        right: 58.33333333%;
        }
        .col-xs-pull-6 {
        right: 50%;
        }
        .col-xs-pull-5 {
        right: 41.66666667%;
        }
        .col-xs-pull-4 {
        right: 33.33333333%;
        }
        .col-xs-pull-3 {
        right: 25%;
        }
        .col-xs-pull-2 {
        right: 16.66666667%;
        }
        .col-xs-pull-1 {
        right: 8.33333333%;
        }
        .col-xs-pull-0 {
        right: auto;
        }
        .col-xs-push-12 {
        left: 100%;
        }
        .col-xs-push-11 {
        left: 91.66666667%;
        }
        .col-xs-push-10 {
        left: 83.33333333%;
        }
        .col-xs-push-9 {
        left: 75%;
        }
        .col-xs-push-8 {
        left: 66.66666667%;
        }
        .col-xs-push-7 {
        left: 58.33333333%;
        }
        .col-xs-push-6 {
        left: 50%;
        }
        .col-xs-push-5 {
        left: 41.66666667%;
        }
        .col-xs-push-4 {
        left: 33.33333333%;
        }
        .col-xs-push-3 {
        left: 25%;
        }
        .col-xs-push-2 {
        left: 16.66666667%;
        }
        .col-xs-push-1 {
        left: 8.33333333%;
        }
        .col-xs-push-0 {
        left: auto;
        }
        .col-xs-offset-12 {
        margin-left: 100%;
        }
        .col-xs-offset-11 {
        margin-left: 91.66666667%;
        }
        .col-xs-offset-10 {
        margin-left: 83.33333333%;
        }
        .col-xs-offset-9 {
        margin-left: 75%;
        }
        .col-xs-offset-8 {
        margin-left: 66.66666667%;
        }
        .col-xs-offset-7 {
        margin-left: 58.33333333%;
        }
        .col-xs-offset-6 {
        margin-left: 50%;
        }
        .col-xs-offset-5 {
        margin-left: 41.66666667%;
        }
        .col-xs-offset-4 {
        margin-left: 33.33333333%;
        }
        .col-xs-offset-3 {
        margin-left: 25%;
        }
        .col-xs-offset-2 {
        margin-left: 16.66666667%;
        }
        .col-xs-offset-1 {
        margin-left: 8.33333333%;
        }
        .col-xs-offset-0 {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
            float: left;
        }
        .col-sm-12 {
            width: 100%;
        }
        .col-sm-11 {
            width: 91.66666667%;
        }
        .col-sm-10 {
            width: 83.33333333%;
        }
        .col-sm-9 {
            width: 75%;
        }
        .col-sm-8 {
            width: 66.66666667%;
        }
        .col-sm-7 {
            width: 58.33333333%;
        }
        .col-sm-6 {
            width: 50%;
        }
        .col-sm-5 {
            width: 41.66666667%;
        }
        .col-sm-4 {
            width: 33.33333333%;
        }
        .col-sm-3 {
            width: 25%;
        }
        .col-sm-2 {
            width: 16.66666667%;
        }
        .col-sm-1 {
            width: 8.33333333%;
        }
        .col-sm-pull-12 {
            right: 100%;
        }
        .col-sm-pull-11 {
            right: 91.66666667%;
        }
        .col-sm-pull-10 {
            right: 83.33333333%;
        }
        .col-sm-pull-9 {
            right: 75%;
        }
        .col-sm-pull-8 {
            right: 66.66666667%;
        }
        .col-sm-pull-7 {
            right: 58.33333333%;
        }
        .col-sm-pull-6 {
            right: 50%;
        }
        .col-sm-pull-5 {
            right: 41.66666667%;
        }
        .col-sm-pull-4 {
            right: 33.33333333%;
        }
        .col-sm-pull-3 {
            right: 25%;
        }
        .col-sm-pull-2 {
            right: 16.66666667%;
        }
        .col-sm-pull-1 {
            right: 8.33333333%;
        }
        .col-sm-pull-0 {
            right: auto;
        }
        .col-sm-push-12 {
            left: 100%;
        }
        .col-sm-push-11 {
            left: 91.66666667%;
        }
        .col-sm-push-10 {
            left: 83.33333333%;
        }
        .col-sm-push-9 {
            left: 75%;
        }
        .col-sm-push-8 {
            left: 66.66666667%;
        }
        .col-sm-push-7 {
            left: 58.33333333%;
        }
        .col-sm-push-6 {
            left: 50%;
        }
        .col-sm-push-5 {
            left: 41.66666667%;
        }
        .col-sm-push-4 {
            left: 33.33333333%;
        }
        .col-sm-push-3 {
            left: 25%;
        }
        .col-sm-push-2 {
            left: 16.66666667%;
        }
        .col-sm-push-1 {
            left: 8.33333333%;
        }
        .col-sm-push-0 {
            left: auto;
        }
        .col-sm-offset-12 {
            margin-left: 100%;
        }
        .col-sm-offset-11 {
            margin-left: 91.66666667%;
        }
        .col-sm-offset-10 {
            margin-left: 83.33333333%;
        }
        .col-sm-offset-9 {
            margin-left: 75%;
        }
        .col-sm-offset-8 {
            margin-left: 66.66666667%;
        }
        .col-sm-offset-7 {
            margin-left: 58.33333333%;
        }
        .col-sm-offset-6 {
            margin-left: 50%;
        }
        .col-sm-offset-5 {
            margin-left: 41.66666667%;
        }
        .col-sm-offset-4 {
            margin-left: 33.33333333%;
        }
        .col-sm-offset-3 {
            margin-left: 25%;
        }
        .col-sm-offset-2 {
            margin-left: 16.66666667%;
        }
        .col-sm-offset-1 {
            margin-left: 8.33333333%;
        }
        .col-sm-offset-0 {
            margin-left: 0;
        }
        }
        @media (min-width: 992px) {
        .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
            float: left;
        }
        .col-md-12 {
            width: 100%;
        }
        .col-md-11 {
            width: 91.66666667%;
        }
        .col-md-10 {
            width: 83.33333333%;
        }
        .col-md-9 {
            width: 75%;
        }
        .col-md-8 {
            width: 66.66666667%;
        }
        .col-md-7 {
            width: 58.33333333%;
        }
        .col-md-6 {
            width: 50%;
        }
        .col-md-5 {
            width: 41.66666667%;
        }
        .col-md-4 {
            width: 33.33333333%;
        }
        .col-md-3 {
            width: 25%;
        }
        .col-md-2 {
            width: 16.66666667%;
        }
        .col-md-1 {
            width: 8.33333333%;
        }
        .col-md-pull-12 {
            right: 100%;
        }
        .col-md-pull-11 {
            right: 91.66666667%;
        }
        .col-md-pull-10 {
            right: 83.33333333%;
        }
        .col-md-pull-9 {
            right: 75%;
        }
        .col-md-pull-8 {
            right: 66.66666667%;
        }
        .col-md-pull-7 {
            right: 58.33333333%;
        }
        .col-md-pull-6 {
            right: 50%;
        }
        .col-md-pull-5 {
            right: 41.66666667%;
        }
        .col-md-pull-4 {
            right: 33.33333333%;
        }
        .col-md-pull-3 {
            right: 25%;
        }
        .col-md-pull-2 {
            right: 16.66666667%;
        }
        .col-md-pull-1 {
            right: 8.33333333%;
        }
        .col-md-pull-0 {
            right: auto;
        }
        .col-md-push-12 {
            left: 100%;
        }
        .col-md-push-11 {
            left: 91.66666667%;
        }
        .col-md-push-10 {
            left: 83.33333333%;
        }
        .col-md-push-9 {
            left: 75%;
        }
        .col-md-push-8 {
            left: 66.66666667%;
        }
        .col-md-push-7 {
            left: 58.33333333%;
        }
        .col-md-push-6 {
            left: 50%;
        }
        .col-md-push-5 {
            left: 41.66666667%;
        }
        .col-md-push-4 {
            left: 33.33333333%;
        }
        .col-md-push-3 {
            left: 25%;
        }
        .col-md-push-2 {
            left: 16.66666667%;
        }
        .col-md-push-1 {
            left: 8.33333333%;
        }
        .col-md-push-0 {
            left: auto;
        }
        .col-md-offset-12 {
            margin-left: 100%;
        }
        .col-md-offset-11 {
            margin-left: 91.66666667%;
        }
        .col-md-offset-10 {
            margin-left: 83.33333333%;
        }
        .col-md-offset-9 {
            margin-left: 75%;
        }
        .col-md-offset-8 {
            margin-left: 66.66666667%;
        }
        .col-md-offset-7 {
            margin-left: 58.33333333%;
        }
        .col-md-offset-6 {
            margin-left: 50%;
        }
        .col-md-offset-5 {
            margin-left: 41.66666667%;
        }
        .col-md-offset-4 {
            margin-left: 33.33333333%;
        }
        .col-md-offset-3 {
            margin-left: 25%;
        }
        .col-md-offset-2 {
            margin-left: 16.66666667%;
        }
        .col-md-offset-1 {
            margin-left: 8.33333333%;
        }
        .col-md-offset-0 {
            margin-left: 0;
        }
        }
        @media (min-width: 768px) {
        .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
            float: left;
        }
        .col-lg-12 {
            width: 100%;
        }
        .col-lg-11 {
            width: 91.66666667%;
        }
        .col-lg-10 {
            width: 83.33333333%;
        }
        .col-lg-9 {
            width: 75%;
        }
        .col-lg-8 {
            width: 66.66666667%;
        }
        .col-lg-7 {
            width: 58.33333333%;
        }
        .col-lg-6 {
            width: 50%;
        }
        .col-lg-5 {
            width: 41.66666667%;
        }
        .col-lg-4 {
            width: 33.33333333%;
        }
        .col-lg-3 {
            width: 25%;
        }
        .col-lg-2 {
            width: 16.66666667%;
        }
        .col-lg-1 {
            width: 8.33333333%;
        }
        .col-lg-pull-12 {
            right: 100%;
        }
        .col-lg-pull-11 {
            right: 91.66666667%;
        }
        .col-lg-pull-10 {
            right: 83.33333333%;
        }
        .col-lg-pull-9 {
            right: 75%;
        }
        .col-lg-pull-8 {
            right: 66.66666667%;
        }
        .col-lg-pull-7 {
            right: 58.33333333%;
        }
        .col-lg-pull-6 {
            right: 50%;
        }
        .col-lg-pull-5 {
            right: 41.66666667%;
        }
        .col-lg-pull-4 {
            right: 33.33333333%;
        }
        .col-lg-pull-3 {
            right: 25%;
        }
        .col-lg-pull-2 {
            right: 16.66666667%;
        }
        .col-lg-pull-1 {
            right: 8.33333333%;
        }
        .col-lg-pull-0 {
            right: auto;
        }
        .col-lg-push-12 {
            left: 100%;
        }
        .col-lg-push-11 {
            left: 91.66666667%;
        }
        .col-lg-push-10 {
            left: 83.33333333%;
        }
        .col-lg-push-9 {
            left: 75%;
        }
        .col-lg-push-8 {
            left: 66.66666667%;
        }
        .col-lg-push-7 {
            left: 58.33333333%;
        }
        .col-lg-push-6 {
            left: 50%;
        }
        .col-lg-push-5 {
            left: 41.66666667%;
        }
        .col-lg-push-4 {
            left: 33.33333333%;
        }
        .col-lg-push-3 {
            left: 25%;
        }
        .col-lg-push-2 {
            left: 16.66666667%;
        }
        .col-lg-push-1 {
            left: 8.33333333%;
        }
        .col-lg-push-0 {
            left: auto;
        }
        .col-lg-offset-12 {
            margin-left: 100%;
        }
        .col-lg-offset-11 {
            margin-left: 91.66666667%;
        }
        .col-lg-offset-10 {
            margin-left: 83.33333333%;
        }
        .col-lg-offset-9 {
            margin-left: 75%;
        }
        .col-lg-offset-8 {
            margin-left: 66.66666667%;
        }
        .col-lg-offset-7 {
            margin-left: 58.33333333%;
        }
        .col-lg-offset-6 {
            margin-left: 50%;
        }
        .col-lg-offset-5 {
            margin-left: 41.66666667%;
        }
        .col-lg-offset-4 {
            margin-left: 33.33333333%;
        }
        .col-lg-offset-3 {
            margin-left: 25%;
        }
        .col-lg-offset-2 {
            margin-left: 16.66666667%;
        }
        .col-lg-offset-1 {
            margin-left: 8.33333333%;
        }
        .col-lg-offset-0 {
            margin-left: 0;
        }
        }
        table {
        background-color: transparent;
        }
        caption {
        padding-top: 8px;
        padding-bottom: 8px;
        color: #777;
        text-align: left;
        }
        th {
        text-align: left;
        }
        .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
        }
        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
        }
        .table > thead > tr > th {
        vertical-align: bottom;
        border-bottom: 2px solid #ddd;
        }
        .table > caption + thead > tr:first-child > th,
        .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > th,
        .table > caption + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > td,
        .table > thead:first-child > tr:first-child > td {
        border-top: 0;
        }
        .table > tbody + tbody {
        border-top: 2px solid #ddd;
        }
        .table .table {
        background-color: #fff;
        }
        .table-condensed > thead > tr > th,
        .table-condensed > tbody > tr > th,
        .table-condensed > tfoot > tr > th,
        .table-condensed > thead > tr > td,
        .table-condensed > tbody > tr > td,
        .table-condensed > tfoot > tr > td {
        padding: 5px;
        }
        .table-bordered {
        border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
        border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
        border-bottom-width: 2px;
        }
        .table-striped > tbody > tr:nth-child(odd) {
        background-color: #f9f9f9;
        }
        .table-hover > tbody > tr:hover {
        background-color: #f5f5f5;
        }
        table col[class*="col-"] {
        position: static;
        display: table-column;
        float: none;
        }
        table td[class*="col-"],
        table th[class*="col-"] {
        position: static;
        display: table-cell;
        float: none;
        }
        .table > thead > tr > td.active,
        .table > tbody > tr > td.active,
        .table > tfoot > tr > td.active,
        .table > thead > tr > th.active,
        .table > tbody > tr > th.active,
        .table > tfoot > tr > th.active,
        .table > thead > tr.active > td,
        .table > tbody > tr.active > td,
        .table > tfoot > tr.active > td,
        .table > thead > tr.active > th,
        .table > tbody > tr.active > th,
        .table > tfoot > tr.active > th {
        background-color: #f5f5f5;
        }
        .table-hover > tbody > tr > td.active:hover,
        .table-hover > tbody > tr > th.active:hover,
        .table-hover > tbody > tr.active:hover > td,
        .table-hover > tbody > tr:hover > .active,
        .table-hover > tbody > tr.active:hover > th {
        background-color: #e8e8e8;
        }
        .table > thead > tr > td.success,
        .table > tbody > tr > td.success,
        .table > tfoot > tr > td.success,
        .table > thead > tr > th.success,
        .table > tbody > tr > th.success,
        .table > tfoot > tr > th.success,
        .table > thead > tr.success > td,
        .table > tbody > tr.success > td,
        .table > tfoot > tr.success > td,
        .table > thead > tr.success > th,
        .table > tbody > tr.success > th,
        .table > tfoot > tr.success > th {
        background-color: #dff0d8;
        }
        .table-hover > tbody > tr > td.success:hover,
        .table-hover > tbody > tr > th.success:hover,
        .table-hover > tbody > tr.success:hover > td,
        .table-hover > tbody > tr:hover > .success,
        .table-hover > tbody > tr.success:hover > th {
        background-color: #d0e9c6;
        }
        .table > thead > tr > td.info,
        .table > tbody > tr > td.info,
        .table > tfoot > tr > td.info,
        .table > thead > tr > th.info,
        .table > tbody > tr > th.info,
        .table > tfoot > tr > th.info,
        .table > thead > tr.info > td,
        .table > tbody > tr.info > td,
        .table > tfoot > tr.info > td,
        .table > thead > tr.info > th,
        .table > tbody > tr.info > th,
        .table > tfoot > tr.info > th {
        background-color: #d9edf7;
        }
        .table-hover > tbody > tr > td.info:hover,
        .table-hover > tbody > tr > th.info:hover,
        .table-hover > tbody > tr.info:hover > td,
        .table-hover > tbody > tr:hover > .info,
        .table-hover > tbody > tr.info:hover > th {
        background-color: #c4e3f3;
        }
        .table > thead > tr > td.warning,
        .table > tbody > tr > td.warning,
        .table > tfoot > tr > td.warning,
        .table > thead > tr > th.warning,
        .table > tbody > tr > th.warning,
        .table > tfoot > tr > th.warning,
        .table > thead > tr.warning > td,
        .table > tbody > tr.warning > td,
        .table > tfoot > tr.warning > td,
        .table > thead > tr.warning > th,
        .table > tbody > tr.warning > th,
        .table > tfoot > tr.warning > th {
        background-color: #fcf8e3;
        }
        .table-hover > tbody > tr > td.warning:hover,
        .table-hover > tbody > tr > th.warning:hover,
        .table-hover > tbody > tr.warning:hover > td,
        .table-hover > tbody > tr:hover > .warning,
        .table-hover > tbody > tr.warning:hover > th {
        background-color: #faf2cc;
        }
        .table > thead > tr > td.danger,
        .table > tbody > tr > td.danger,
        .table > tfoot > tr > td.danger,
        .table > thead > tr > th.danger,
        .table > tbody > tr > th.danger,
        .table > tfoot > tr > th.danger,
        .table > thead > tr.danger > td,
        .table > tbody > tr.danger > td,
        .table > tfoot > tr.danger > td,
        .table > thead > tr.danger > th,
        .table > tbody > tr.danger > th,
        .table > tfoot > tr.danger > th {
        background-color: #f2dede;
        }
        .table-hover > tbody > tr > td.danger:hover,
        .table-hover > tbody > tr > th.danger:hover,
        .table-hover > tbody > tr.danger:hover > td,
        .table-hover > tbody > tr:hover > .danger,
        .table-hover > tbody > tr.danger:hover > th {
        background-color: #ebcccc;
        }
        .table-responsive {
        min-height: .01%;
        overflow-x: auto;
        }
        @media screen and (max-width: 767px) {
        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #ddd;
        }
        .table-responsive > .table {
            margin-bottom: 0;
        }
        .table-responsive > .table > thead > tr > th,
        .table-responsive > .table > tbody > tr > th,
        .table-responsive > .table > tfoot > tr > th,
        .table-responsive > .table > thead > tr > td,
        .table-responsive > .table > tbody > tr > td,
        .table-responsive > .table > tfoot > tr > td {
            white-space: nowrap;
        }
        .table-responsive > .table-bordered {
            border: 0;
        }
        .table-responsive > .table-bordered > thead > tr > th:first-child,
        .table-responsive > .table-bordered > tbody > tr > th:first-child,
        .table-responsive > .table-bordered > tfoot > tr > th:first-child,
        .table-responsive > .table-bordered > thead > tr > td:first-child,
        .table-responsive > .table-bordered > tbody > tr > td:first-child,
        .table-responsive > .table-bordered > tfoot > tr > td:first-child {
            border-left: 0;
        }
        .table-responsive > .table-bordered > thead > tr > th:last-child,
        .table-responsive > .table-bordered > tbody > tr > th:last-child,
        .table-responsive > .table-bordered > tfoot > tr > th:last-child,
        .table-responsive > .table-bordered > thead > tr > td:last-child,
        .table-responsive > .table-bordered > tbody > tr > td:last-child,
        .table-responsive > .table-bordered > tfoot > tr > td:last-child {
            border-right: 0;
        }
        .table-responsive > .table-bordered > tbody > tr:last-child > th,
        .table-responsive > .table-bordered > tfoot > tr:last-child > th,
        .table-responsive > .table-bordered > tbody > tr:last-child > td,
        .table-responsive > .table-bordered > tfoot > tr:last-child > td {
            border-bottom: 0;
        }
        }
        fieldset {
        min-width: 0;
        padding: 0;
        margin: 0;
        border: 0;
        }
        legend {
        display: block;
        width: 100%;
        padding: 0;
        margin-bottom: 20px;
        font-size: 21px;
        line-height: inherit;
        color: #333;
        border: 0;
        border-bottom: 1px solid #e5e5e5;
        }
        label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: bold;
        }
        input[type="search"] {
        -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
                box-sizing: border-box;
        }
        input[type="radio"],
        input[type="checkbox"] {
        margin: 4px 0 0;
        margin-top: 1px \9;
        line-height: normal;
        }
        input[type="file"] {
        display: block;
        }
        input[type="range"] {
        display: block;
        width: 100%;
        }
        select[multiple],
        select[size] {
        height: auto;
        }
        input[type="file"]:focus,
        input[type="radio"]:focus,
        input[type="checkbox"]:focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
        }
        output {
        display: block;
        padding-top: 7px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        }
        .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .form-control:focus {
        border-color: #66afe9;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
        }
        .form-control::-moz-placeholder {
        color: #999;
        opacity: 1;
        }
        .form-control:-ms-input-placeholder {
        color: #999;
        }
        .form-control::-webkit-input-placeholder {
        color: #999;
        }
        .form-control[disabled],
        .form-control[readonly],
        fieldset[disabled] .form-control {
        cursor: not-allowed;
        background-color: #eee;
        opacity: 1;
        }
        textarea.form-control {
        height: auto;
        }
        input[type="search"] {
        -webkit-appearance: none;
        }
        input[type="date"],
        input[type="time"],
        input[type="datetime-local"],
        input[type="month"] {
        line-height: 34px;
        line-height: 1.42857143 \0;
        }
        input[type="date"].input-sm,
        input[type="time"].input-sm,
        input[type="datetime-local"].input-sm,
        input[type="month"].input-sm {
        line-height: 30px;
        line-height: 1.5 \0;
        }
        input[type="date"].input-lg,
        input[type="time"].input-lg,
        input[type="datetime-local"].input-lg,
        input[type="month"].input-lg {
        line-height: 46px;
        line-height: 1.33 \0;
        }
        _:-ms-fullscreen,
        :root input[type="date"],
        _:-ms-fullscreen,
        :root input[type="time"],
        _:-ms-fullscreen,
        :root input[type="datetime-local"],
        _:-ms-fullscreen,
        :root input[type="month"] {
        line-height: 1.42857143;
        }
        _:-ms-fullscreen.input-sm,
        :root input[type="date"].input-sm,
        _:-ms-fullscreen.input-sm,
        :root input[type="time"].input-sm,
        _:-ms-fullscreen.input-sm,
        :root input[type="datetime-local"].input-sm,
        _:-ms-fullscreen.input-sm,
        :root input[type="month"].input-sm {
        line-height: 1.5;
        }
        _:-ms-fullscreen.input-lg,
        :root input[type="date"].input-lg,
        _:-ms-fullscreen.input-lg,
        :root input[type="time"].input-lg,
        _:-ms-fullscreen.input-lg,
        :root input[type="datetime-local"].input-lg,
        _:-ms-fullscreen.input-lg,
        :root input[type="month"].input-lg {
        line-height: 1.33;
        }
        .form-group {
        margin-bottom: 15px;
        }
        .radio,
        .checkbox {
        position: relative;
        display: block;
        margin-top: 10px;
        margin-bottom: 10px;
        }
        .radio label,
        .checkbox label {
        min-height: 20px;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: normal;
        cursor: pointer;
        }
        .radio input[type="radio"],
        .radio-inline input[type="radio"],
        .checkbox input[type="checkbox"],
        .checkbox-inline input[type="checkbox"] {
        position: absolute;
        margin-top: 4px \9;
        margin-left: -20px;
        }
        .radio + .radio,
        .checkbox + .checkbox {
        margin-top: -5px;
        }
        .radio-inline,
        .checkbox-inline {
        display: inline-block;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: normal;
        vertical-align: middle;
        cursor: pointer;
        }
        .radio-inline + .radio-inline,
        .checkbox-inline + .checkbox-inline {
        margin-top: 0;
        margin-left: 10px;
        }
        input[type="radio"][disabled],
        input[type="checkbox"][disabled],
        input[type="radio"].disabled,
        input[type="checkbox"].disabled,
        fieldset[disabled] input[type="radio"],
        fieldset[disabled] input[type="checkbox"] {
        cursor: not-allowed;
        }
        .radio-inline.disabled,
        .checkbox-inline.disabled,
        fieldset[disabled] .radio-inline,
        fieldset[disabled] .checkbox-inline {
        cursor: not-allowed;
        }
        .radio.disabled label,
        .checkbox.disabled label,
        fieldset[disabled] .radio label,
        fieldset[disabled] .checkbox label {
        cursor: not-allowed;
        }
        .form-control-static {
        padding-top: 7px;
        padding-bottom: 7px;
        margin-bottom: 0;
        }
        .form-control-static.input-lg,
        .form-control-static.input-sm {
        padding-right: 0;
        padding-left: 0;
        }
        .input-sm,
        .form-group-sm .form-control {
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
        }
        select.input-sm,
        select.form-group-sm .form-control {
        height: 30px;
        line-height: 30px;
        }
        textarea.input-sm,
        textarea.form-group-sm .form-control,
        select[multiple].input-sm,
        select[multiple].form-group-sm .form-control {
        height: auto;
        }
        .input-lg,
        .form-group-lg .form-control {
        height: 46px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
        }
        select.input-lg,
        select.form-group-lg .form-control {
        height: 46px;
        line-height: 46px;
        }
        textarea.input-lg,
        textarea.form-group-lg .form-control,
        select[multiple].input-lg,
        select[multiple].form-group-lg .form-control {
        height: auto;
        }
        .has-feedback {
        position: relative;
        }
        .has-feedback .form-control {
        padding-right: 42.5px;
        }
        .form-control-feedback {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        display: block;
        width: 34px;
        height: 34px;
        line-height: 34px;
        text-align: center;
        pointer-events: none;
        }
        .input-lg + .form-control-feedback {
        width: 46px;
        height: 46px;
        line-height: 46px;
        }
        .input-sm + .form-control-feedback {
        width: 30px;
        height: 30px;
        line-height: 30px;
        }
        .has-success .help-block,
        .has-success .control-label,
        .has-success .radio,
        .has-success .checkbox,
        .has-success .radio-inline,
        .has-success .checkbox-inline,
        .has-success.radio label,
        .has-success.checkbox label,
        .has-success.radio-inline label,
        .has-success.checkbox-inline label {
        color: #3c763d;
        }
        .has-success .form-control {
        border-color: #3c763d;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .has-success .form-control:focus {
        border-color: #2b542c;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
        }
        .has-success .input-group-addon {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #3c763d;
        }
        .has-success .form-control-feedback {
        color: #3c763d;
        }
        .has-warning .help-block,
        .has-warning .control-label,
        .has-warning .radio,
        .has-warning .checkbox,
        .has-warning .radio-inline,
        .has-warning .checkbox-inline,
        .has-warning.radio label,
        .has-warning.checkbox label,
        .has-warning.radio-inline label,
        .has-warning.checkbox-inline label {
        color: #8a6d3b;
        }
        .has-warning .form-control {
        border-color: #8a6d3b;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .has-warning .form-control:focus {
        border-color: #66512c;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
        }
        .has-warning .input-group-addon {
        color: #8a6d3b;
        background-color: #fcf8e3;
        border-color: #8a6d3b;
        }
        .has-warning .form-control-feedback {
        color: #8a6d3b;
        }
        .has-error .help-block,
        .has-error .control-label,
        .has-error .radio,
        .has-error .checkbox,
        .has-error .radio-inline,
        .has-error .checkbox-inline,
        .has-error.radio label,
        .has-error.checkbox label,
        .has-error.radio-inline label,
        .has-error.checkbox-inline label {
        color: #a94442;
        }
        .has-error .form-control {
        border-color: #a94442;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .has-error .form-control:focus {
        border-color: #843534;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
        }
        .has-error .input-group-addon {
        color: #a94442;
        background-color: #f2dede;
        border-color: #a94442;
        }
        .has-error .form-control-feedback {
        color: #a94442;
        }
        .has-feedback label ~ .form-control-feedback {
        top: 25px;
        }
        .has-feedback label.sr-only ~ .form-control-feedback {
        top: 0;
        }
        .help-block {
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
        color: #737373;
        }
        @media (min-width: 768px) {
        .form-inline .form-group {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
        }
        .form-inline .form-control {
            display: inline-block;
            width: auto;
            vertical-align: middle;
        }
        .form-inline .form-control-static {
            display: inline-block;
        }
        .form-inline .input-group {
            display: inline-table;
            vertical-align: middle;
        }
        .form-inline .input-group .input-group-addon,
        .form-inline .input-group .input-group-btn,
        .form-inline .input-group .form-control {
            width: auto;
        }
        .form-inline .input-group > .form-control {
            width: 100%;
        }
        .form-inline .control-label {
            margin-bottom: 0;
            vertical-align: middle;
        }
        .form-inline .radio,
        .form-inline .checkbox {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 0;
            vertical-align: middle;
        }
        .form-inline .radio label,
        .form-inline .checkbox label {
            padding-left: 0;
        }
        .form-inline .radio input[type="radio"],
        .form-inline .checkbox input[type="checkbox"] {
            position: relative;
            margin-left: 0;
        }
        .form-inline .has-feedback .form-control-feedback {
            top: 0;
        }
        }
        .form-horizontal .radio,
        .form-horizontal .checkbox,
        .form-horizontal .radio-inline,
        .form-horizontal .checkbox-inline {
        padding-top: 7px;
        margin-top: 0;
        margin-bottom: 0;
        }
        .form-horizontal .radio,
        .form-horizontal .checkbox {
        min-height: 27px;
        }
        .form-horizontal .form-group {
        margin-right: -15px;
        margin-left: -15px;
        }
        @media (min-width: 768px) {
        .form-horizontal .control-label {
            padding-top: 7px;
            margin-bottom: 0;
            text-align: right;
        }
        }
        .form-horizontal .has-feedback .form-control-feedback {
        right: 15px;
        }
        @media (min-width: 768px) {
        .form-horizontal .form-group-lg .control-label {
            padding-top: 14.3px;
        }
        }
        @media (min-width: 768px) {
        .form-horizontal .form-group-sm .control-label {
            padding-top: 6px;
        }
        }
        .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
            touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        }
        .btn:focus,
        .btn:active:focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn.active.focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
        }
        .btn:hover,
        .btn:focus,
        .btn.focus {
        color: #333;
        text-decoration: none;
        }
        .btn:active,
        .btn.active {
        background-image: none;
        outline: 0;
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }
        .btn.disabled,
        .btn[disabled],
        fieldset[disabled] .btn {
        pointer-events: none;
        cursor: not-allowed;
        filter: alpha(opacity=65);
        -webkit-box-shadow: none;
                box-shadow: none;
        opacity: .65;
        }
        .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
        }
        .btn-default:hover,
        .btn-default:focus,
        .btn-default.focus,
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad;
        }
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
        background-image: none;
        }
        .btn-default.disabled,
        .btn-default[disabled],
        fieldset[disabled] .btn-default,
        .btn-default.disabled:hover,
        .btn-default[disabled]:hover,
        fieldset[disabled] .btn-default:hover,
        .btn-default.disabled:focus,
        .btn-default[disabled]:focus,
        fieldset[disabled] .btn-default:focus,
        .btn-default.disabled.focus,
        .btn-default[disabled].focus,
        fieldset[disabled] .btn-default.focus,
        .btn-default.disabled:active,
        .btn-default[disabled]:active,
        fieldset[disabled] .btn-default:active,
        .btn-default.disabled.active,
        .btn-default[disabled].active,
        fieldset[disabled] .btn-default.active {
        background-color: #fff;
        border-color: #ccc;
        }
        .btn-default .badge {
        color: #fff;
        background-color: #333;
        }
        .btn-primary {
        color: #fff;
        background-color: #428bca;
        border-color: #357ebd;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary.focus,
        .btn-primary:active,
        .btn-primary.active,
        .open > .dropdown-toggle.btn-primary {
        color: #fff;
        background-color: #3071a9;
        border-color: #285e8e;
        }
        .btn-primary:active,
        .btn-primary.active,
        .open > .dropdown-toggle.btn-primary {
        background-image: none;
        }
        .btn-primary.disabled,
        .btn-primary[disabled],
        fieldset[disabled] .btn-primary,
        .btn-primary.disabled:hover,
        .btn-primary[disabled]:hover,
        fieldset[disabled] .btn-primary:hover,
        .btn-primary.disabled:focus,
        .btn-primary[disabled]:focus,
        fieldset[disabled] .btn-primary:focus,
        .btn-primary.disabled.focus,
        .btn-primary[disabled].focus,
        fieldset[disabled] .btn-primary.focus,
        .btn-primary.disabled:active,
        .btn-primary[disabled]:active,
        fieldset[disabled] .btn-primary:active,
        .btn-primary.disabled.active,
        .btn-primary[disabled].active,
        fieldset[disabled] .btn-primary.active {
        background-color: #428bca;
        border-color: #357ebd;
        }
        .btn-primary .badge {
        color: #428bca;
        background-color: #fff;
        }
        .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
        }
        .btn-success:hover,
        .btn-success:focus,
        .btn-success.focus,
        .btn-success:active,
        .btn-success.active,
        .open > .dropdown-toggle.btn-success {
        color: #fff;
        background-color: #449d44;
        border-color: #398439;
        }
        .btn-success:active,
        .btn-success.active,
        .open > .dropdown-toggle.btn-success {
        background-image: none;
        }
        .btn-success.disabled,
        .btn-success[disabled],
        fieldset[disabled] .btn-success,
        .btn-success.disabled:hover,
        .btn-success[disabled]:hover,
        fieldset[disabled] .btn-success:hover,
        .btn-success.disabled:focus,
        .btn-success[disabled]:focus,
        fieldset[disabled] .btn-success:focus,
        .btn-success.disabled.focus,
        .btn-success[disabled].focus,
        fieldset[disabled] .btn-success.focus,
        .btn-success.disabled:active,
        .btn-success[disabled]:active,
        fieldset[disabled] .btn-success:active,
        .btn-success.disabled.active,
        .btn-success[disabled].active,
        fieldset[disabled] .btn-success.active {
        background-color: #5cb85c;
        border-color: #4cae4c;
        }
        .btn-success .badge {
        color: #5cb85c;
        background-color: #fff;
        }
        .btn-info {
        color: #fff;
        background-color: #529fe7;
        border-color: #46b8da;
        }
        .btn-info:hover,
        .btn-info:focus,
        .btn-info.focus,
        .btn-info:active,
        .btn-info.active,
        .open > .dropdown-toggle.btn-info {
        color: #fff;
        background-color: #31b0d5;
        border-color: #269abc;
        }
        .btn-info:active,
        .btn-info.active,
        .open > .dropdown-toggle.btn-info {
        background-image: none;
        }
        .btn-info.disabled,
        .btn-info[disabled],
        fieldset[disabled] .btn-info,
        .btn-info.disabled:hover,
        .btn-info[disabled]:hover,
        fieldset[disabled] .btn-info:hover,
        .btn-info.disabled:focus,
        .btn-info[disabled]:focus,
        fieldset[disabled] .btn-info:focus,
        .btn-info.disabled.focus,
        .btn-info[disabled].focus,
        fieldset[disabled] .btn-info.focus,
        .btn-info.disabled:active,
        .btn-info[disabled]:active,
        fieldset[disabled] .btn-info:active,
        .btn-info.disabled.active,
        .btn-info[disabled].active,
        fieldset[disabled] .btn-info.active {
        background-color: #529fe7;
        border-color: #46b8da;
        }
        .btn-info .badge {
        color: #529fe7;
        background-color: #fff;
        }
        .btn-warning {
        color: #fff;
        background-color: #f0ad4e;
        border-color: #eea236;
        }
        .btn-warning:hover,
        .btn-warning:focus,
        .btn-warning.focus,
        .btn-warning:active,
        .btn-warning.active,
        .open > .dropdown-toggle.btn-warning {
        color: #fff;
        background-color: #ec971f;
        border-color: #d58512;
        }
        .btn-warning:active,
        .btn-warning.active,
        .open > .dropdown-toggle.btn-warning {
        background-image: none;
        }
        .btn-warning.disabled,
        .btn-warning[disabled],
        fieldset[disabled] .btn-warning,
        .btn-warning.disabled:hover,
        .btn-warning[disabled]:hover,
        fieldset[disabled] .btn-warning:hover,
        .btn-warning.disabled:focus,
        .btn-warning[disabled]:focus,
        fieldset[disabled] .btn-warning:focus,
        .btn-warning.disabled.focus,
        .btn-warning[disabled].focus,
        fieldset[disabled] .btn-warning.focus,
        .btn-warning.disabled:active,
        .btn-warning[disabled]:active,
        fieldset[disabled] .btn-warning:active,
        .btn-warning.disabled.active,
        .btn-warning[disabled].active,
        fieldset[disabled] .btn-warning.active {
        background-color: #f0ad4e;
        border-color: #eea236;
        }
        .btn-warning .badge {
        color: #f0ad4e;
        background-color: #fff;
        }
        .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
        }
        .btn-danger:hover,
        .btn-danger:focus,
        .btn-danger.focus,
        .btn-danger:active,
        .btn-danger.active,
        .open > .dropdown-toggle.btn-danger {
        color: #fff;
        background-color: #c9302c;
        border-color: #ac2925;
        }
        .btn-danger:active,
        .btn-danger.active,
        .open > .dropdown-toggle.btn-danger {
        background-image: none;
        }
        .btn-danger.disabled,
        .btn-danger[disabled],
        fieldset[disabled] .btn-danger,
        .btn-danger.disabled:hover,
        .btn-danger[disabled]:hover,
        fieldset[disabled] .btn-danger:hover,
        .btn-danger.disabled:focus,
        .btn-danger[disabled]:focus,
        fieldset[disabled] .btn-danger:focus,
        .btn-danger.disabled.focus,
        .btn-danger[disabled].focus,
        fieldset[disabled] .btn-danger.focus,
        .btn-danger.disabled:active,
        .btn-danger[disabled]:active,
        fieldset[disabled] .btn-danger:active,
        .btn-danger.disabled.active,
        .btn-danger[disabled].active,
        fieldset[disabled] .btn-danger.active {
        background-color: #d9534f;
        border-color: #d43f3a;
        }
        .btn-danger .badge {
        color: #d9534f;
        background-color: #fff;
        }
        .btn-link {
        font-weight: normal;
        color: #428bca;
        border-radius: 0;
        }
        .btn-link,
        .btn-link:active,
        .btn-link.active,
        .btn-link[disabled],
        fieldset[disabled] .btn-link {
        background-color: transparent;
        -webkit-box-shadow: none;
                box-shadow: none;
        }
        .btn-link,
        .btn-link:hover,
        .btn-link:focus,
        .btn-link:active {
        border-color: transparent;
        }
        .btn-link:hover,
        .btn-link:focus {
        color: #2a6496;
        text-decoration: underline;
        background-color: transparent;
        }
        .btn-link[disabled]:hover,
        fieldset[disabled] .btn-link:hover,
        .btn-link[disabled]:focus,
        fieldset[disabled] .btn-link:focus {
        color: #777;
        text-decoration: none;
        }
        .btn-lg,
        .btn-group-lg > .btn {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
        }
        .btn-sm,
        .btn-group-sm > .btn {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
        }
        .btn-xs,
        .btn-group-xs > .btn {
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
        }
        .btn-block {
        display: block;
        width: 100%;
        }
        .btn-block + .btn-block {
        margin-top: 5px;
        }
        input[type="submit"].btn-block,
        input[type="reset"].btn-block,
        input[type="button"].btn-block {
        width: 100%;
        }
        .fade {
        opacity: 0;
        -webkit-transition: opacity .15s linear;
            -o-transition: opacity .15s linear;
                transition: opacity .15s linear;
        }
        .fade.in {
        opacity: 1;
        }
        .collapse {
        display: none;
        visibility: hidden;
        }
        .collapse.in {
        display: block;
        visibility: visible;
        }
        tr.collapse.in {
        display: table-row;
        }
        tbody.collapse.in {
        display: table-row-group;
        }
        .collapsing {
        position: relative;
        height: 0;
        overflow: hidden;
        -webkit-transition-timing-function: ease;
            -o-transition-timing-function: ease;
                transition-timing-function: ease;
        -webkit-transition-duration: .35s;
            -o-transition-duration: .35s;
                transition-duration: .35s;
        -webkit-transition-property: height, visibility;
            -o-transition-property: height, visibility;
                transition-property: height, visibility;
        }
        .caret {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 4px solid;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
        }
        .dropdown {
        position: relative;
        }
        .dropdown-toggle:focus {
        outline: 0;
        }
        .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        text-align: left;
        list-style: none;
        background-color: #fff;
        -webkit-background-clip: padding-box;
                background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        }
        .dropdown-menu.pull-right {
        right: 0;
        left: auto;
        }
        .dropdown-menu .divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
        }
        .dropdown-menu > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
        }
        .dropdown-menu > li > a:hover,
        .dropdown-menu > li > a:focus {
        color: #262626;
        text-decoration: none;
        background-color: #f5f5f5;
        }
        .dropdown-menu > .active > a,
        .dropdown-menu > .active > a:hover,
        .dropdown-menu > .active > a:focus {
        color: #fff;
        text-decoration: none;
        background-color: #428bca;
        outline: 0;
        }
        .dropdown-menu > .disabled > a,
        .dropdown-menu > .disabled > a:hover,
        .dropdown-menu > .disabled > a:focus {
        color: #777;
        }
        .dropdown-menu > .disabled > a:hover,
        .dropdown-menu > .disabled > a:focus {
        text-decoration: none;
        cursor: not-allowed;
        background-color: transparent;
        background-image: none;
        filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
        }
        .open > .dropdown-menu {
        display: block;
        }
        .open > a {
        outline: 0;
        }
        .dropdown-menu-right {
        right: 0;
        left: auto;
        }
        .dropdown-menu-left {
        right: auto;
        left: 0;
        }
        .dropdown-header {
        display: block;
        padding: 3px 20px;
        font-size: 12px;
        line-height: 1.42857143;
        color: #777;
        white-space: nowrap;
        }
        .dropdown-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 990;
        }
        .pull-right > .dropdown-menu {
        right: 0;
        left: auto;
        }
        .dropup .caret,
        .navbar-fixed-bottom .dropdown .caret {
        content: "";
        border-top: 0;
        border-bottom: 4px solid;
        }
        .dropup .dropdown-menu,
        .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: auto;
        bottom: 100%;
        margin-bottom: 1px;
        }
        @media (min-width: 768px) {
        .navbar-right .dropdown-menu {
            right: 0;
            left: auto;
        }
        .navbar-right .dropdown-menu-left {
            right: auto;
            left: 0;
        }
        }
        .btn-group,
        .btn-group-vertical {
        position: relative;
        display: inline-block;
        vertical-align: middle;
        }
        .btn-group > .btn,
        .btn-group-vertical > .btn {
        position: relative;
        float: left;
        }
        .btn-group > .btn:hover,
        .btn-group-vertical > .btn:hover,
        .btn-group > .btn:focus,
        .btn-group-vertical > .btn:focus,
        .btn-group > .btn:active,
        .btn-group-vertical > .btn:active,
        .btn-group > .btn.active,
        .btn-group-vertical > .btn.active {
        z-index: 2;
        }
        .btn-group > .btn:focus,
        .btn-group-vertical > .btn:focus {
        outline: 0;
        }
        .btn-group .btn + .btn,
        .btn-group .btn + .btn-group,
        .btn-group .btn-group + .btn,
        .btn-group .btn-group + .btn-group {
        margin-left: -1px;
        }
        .btn-toolbar {
        margin-left: -5px;
        }
        .btn-toolbar .btn-group,
        .btn-toolbar .input-group {
        float: left;
        }
        .btn-toolbar > .btn,
        .btn-toolbar > .btn-group,
        .btn-toolbar > .input-group {
        margin-left: 5px;
        }
        .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
        border-radius: 0;
        }
        .btn-group > .btn:first-child {
        margin-left: 0;
        }
        .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        }
        .btn-group > .btn:last-child:not(:first-child),
        .btn-group > .dropdown-toggle:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        }
        .btn-group > .btn-group {
        float: left;
        }
        .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
        border-radius: 0;
        }
        .btn-group > .btn-group:first-child > .btn:last-child,
        .btn-group > .btn-group:first-child > .dropdown-toggle {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        }
        .btn-group > .btn-group:last-child > .btn:first-child {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        }
        .btn-group .dropdown-toggle:active,
        .btn-group.open .dropdown-toggle {
        outline: 0;
        }
        .btn-group > .btn + .dropdown-toggle {
        padding-right: 8px;
        padding-left: 8px;
        }
        .btn-group > .btn-lg + .dropdown-toggle {
        padding-right: 12px;
        padding-left: 12px;
        }
        .btn-group.open .dropdown-toggle {
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }
        .btn-group.open .dropdown-toggle.btn-link {
        -webkit-box-shadow: none;
                box-shadow: none;
        }
        .btn .caret {
        margin-left: 0;
        }
        .btn-lg .caret {
        border-width: 5px 5px 0;
        border-bottom-width: 0;
        }
        .dropup .btn-lg .caret {
        border-width: 0 5px 5px;
        }
        .btn-group-vertical > .btn,
        .btn-group-vertical > .btn-group,
        .btn-group-vertical > .btn-group > .btn {
        display: block;
        float: none;
        width: 100%;
        max-width: 100%;
        }
        .btn-group-vertical > .btn-group > .btn {
        float: none;
        }
        .btn-group-vertical > .btn + .btn,
        .btn-group-vertical > .btn + .btn-group,
        .btn-group-vertical > .btn-group + .btn,
        .btn-group-vertical > .btn-group + .btn-group {
        margin-top: -1px;
        margin-left: 0;
        }
        .btn-group-vertical > .btn:not(:first-child):not(:last-child) {
        border-radius: 0;
        }
        .btn-group-vertical > .btn:first-child:not(:last-child) {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }
        .btn-group-vertical > .btn:last-child:not(:first-child) {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-left-radius: 4px;
        }
        .btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
        border-radius: 0;
        }
        .btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child,
        .btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }
        .btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
        .btn-group-justified {
        display: table;
        width: 100%;
        table-layout: fixed;
        border-collapse: separate;
        }
        .btn-group-justified > .btn,
        .btn-group-justified > .btn-group {
        display: table-cell;
        float: none;
        width: 1%;
        }
        .btn-group-justified > .btn-group .btn {
        width: 100%;
        }
        .btn-group-justified > .btn-group .dropdown-menu {
        left: auto;
        }
        [data-toggle="buttons"] > .btn input[type="radio"],
        [data-toggle="buttons"] > .btn-group > .btn input[type="radio"],
        [data-toggle="buttons"] > .btn input[type="checkbox"],
        [data-toggle="buttons"] > .btn-group > .btn input[type="checkbox"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
        }
        .input-group {
        position: relative;
        display: table;
        border-collapse: separate;
            z-index: 2;
            float: left;
            width: 100%;
            margin-bottom: 0;
        }
        .input-group[class*="col-"] {
        float: none;
        padding-right: 0;
        padding-left: 0;
        }
        .input-group .form-control {
        position: relative;
        z-index: 2;
        float: left;
        width: 100%;
        margin-bottom: 0;
        }
        .input-group-lg > .form-control,
        .input-group-lg > .input-group-addon,
        .input-group-lg > .input-group-btn > .btn {
        height: 46px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
        }
        select.input-group-lg > .form-control,
        select.input-group-lg > .input-group-addon,
        select.input-group-lg > .input-group-btn > .btn {
        height: 46px;
        line-height: 46px;
        }
        textarea.input-group-lg > .form-control,
        textarea.input-group-lg > .input-group-addon,
        textarea.input-group-lg > .input-group-btn > .btn,
        select[multiple].input-group-lg > .form-control,
        select[multiple].input-group-lg > .input-group-addon,
        select[multiple].input-group-lg > .input-group-btn > .btn {
        height: auto;
        }
        .input-group-sm > .form-control,
        .input-group-sm > .input-group-addon,
        .input-group-sm > .input-group-btn > .btn {
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
        }
        select.input-group-sm > .form-control,
        select.input-group-sm > .input-group-addon,
        select.input-group-sm > .input-group-btn > .btn {
        height: 30px;
        line-height: 30px;
        }
        textarea.input-group-sm > .form-control,
        textarea.input-group-sm > .input-group-addon,
        textarea.input-group-sm > .input-group-btn > .btn,
        select[multiple].input-group-sm > .form-control,
        select[multiple].input-group-sm > .input-group-addon,
        select[multiple].input-group-sm > .input-group-btn > .btn {
        height: auto;
        }
        .input-group-addon,
        .input-group-btn,
        .input-group .form-control {
        display: table-cell;
        }
        .input-group-addon:not(:first-child):not(:last-child),
        .input-group-btn:not(:first-child):not(:last-child),
        .input-group .form-control:not(:first-child):not(:last-child) {
        border-radius: 0;
        }
        .input-group-addon,
        .input-group-btn {
        width: 1%;
        white-space: nowrap;
        vertical-align: middle;
        }
        .input-group-addon {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
        }
        .input-group-addon.input-sm {
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 3px;
        }
        .input-group-addon.input-lg {
        padding: 10px 16px;
        font-size: 18px;
        border-radius: 6px;
        }
        .input-group-addon input[type="radio"],
        .input-group-addon input[type="checkbox"] {
        margin-top: 0;
        }
        .input-group .form-control:first-child,
        .input-group-addon:first-child,
        .input-group-btn:first-child > .btn,
        .input-group-btn:first-child > .btn-group > .btn,
        .input-group-btn:first-child > .dropdown-toggle,
        .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle),
        .input-group-btn:last-child > .btn-group:not(:last-child) > .btn {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        }
        .input-group-addon:first-child {
        border-right: 0;
        }
        .input-group .form-control:last-child,
        .input-group-addon:last-child,
        .input-group-btn:last-child > .btn,
        .input-group-btn:last-child > .btn-group > .btn,
        .input-group-btn:last-child > .dropdown-toggle,
        .input-group-btn:first-child > .btn:not(:first-child),
        .input-group-btn:first-child > .btn-group:not(:first-child) > .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        }
        .input-group-addon:last-child {
        border-left: 0;
        }
        .input-group-btn {
        position: relative;
        font-size: 0;
        white-space: nowrap;
        }
        .input-group-btn > .btn {
        position: relative;
        }
        .input-group-btn > .btn + .btn {
        margin-left: -1px;
        }
        .input-group-btn > .btn:hover,
        .input-group-btn > .btn:focus,
        .input-group-btn > .btn:active {
        z-index: 2;
        }
        .input-group-btn:first-child > .btn,
        .input-group-btn:first-child > .btn-group {
        margin-right: -1px;
        }
        .input-group-btn:last-child > .btn,
        .input-group-btn:last-child > .btn-group {
        margin-left: -1px;
        }
        .nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
        }
        .nav > li {
        position: relative;
        display: block;
        }
        .nav > li > a {
        position: relative;
        display: block;
        padding: 10px 15px;
        }
        .nav > li > a:hover,
        .nav > li > a:focus {
        text-decoration: none;
        background-color: #eee;
        }
        .nav > li.disabled > a {
        color: #777;
        }
        .nav > li.disabled > a:hover,
        .nav > li.disabled > a:focus {
        color: #777;
        text-decoration: none;
        cursor: not-allowed;
        background-color: transparent;
        }
        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus {
        background-color: #eee;
        border-color: #428bca;
        }
        .nav .nav-divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
        }
        .nav > li > a > img {
        max-width: none;
        }
        .nav-tabs {
        /*border-bottom: 1px solid #ddd;*/
        }
        .nav-tabs > li {
        float: left;
        margin-bottom: -1px;
        }
        .nav-tabs > li > a {
        margin-right: 2px;
        line-height: 1.42857143;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0;
        }
        .nav-tabs > li > a:hover {
        border-color: #eee #eee #ddd;
        }
        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
        color: #555;
        cursor: default;
        background-color: #fff;
        /*border: 1px solid #ddd;*/
        border-bottom-color: transparent;
        }
        .nav-tabs.nav-justified {
        width: 100%;
        border-bottom: 0;
        }
        .nav-tabs.nav-justified > li {
        float: none;
        }
        .nav-tabs.nav-justified > li > a {
        margin-bottom: 5px;
        text-align: center;
        }
        .nav-tabs.nav-justified > .dropdown .dropdown-menu {
        top: auto;
        left: auto;
        }
        @media (min-width: 768px) {
        .nav-tabs.nav-justified > li {
            display: table-cell;
            width: 1%;
        }
        .nav-tabs.nav-justified > li > a {
            margin-bottom: 0;
        }
        }
        .nav-tabs.nav-justified > li > a {
        margin-right: 0;
        border-radius: 4px;
        }
        .nav-tabs.nav-justified > .active > a,
        .nav-tabs.nav-justified > .active > a:hover,
        .nav-tabs.nav-justified > .active > a:focus {
        border: 1px solid #ddd;
        }
        @media (min-width: 768px) {
        .nav-tabs.nav-justified > li > a {
            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0;
        }
        .nav-tabs.nav-justified > .active > a,
        .nav-tabs.nav-justified > .active > a:hover,
        .nav-tabs.nav-justified > .active > a:focus {
            border-bottom-color: #fff;
        }
        }
        .nav-pills > li {
        float: left;
        }
        .nav-pills > li > a {
        border-radius: 4px;
        }
        .nav-pills > li + li {
        margin-left: 2px;
        }
        .nav-pills > li.active > a,
        .nav-pills > li.active > a:hover,
        .nav-pills > li.active > a:focus {
        color: #fff;
        background-color: #428bca;
        }
        .nav-stacked > li {
        float: none;
        }
        .nav-stacked > li + li {
        margin-top: 2px;
        margin-left: 0;
        }
        .nav-justified {
        width: 100%;
        }
        .nav-justified > li {
        float: none;
        }
        .nav-justified > li > a {
        margin-bottom: 5px;
        text-align: center;
        }
        .nav-justified > .dropdown .dropdown-menu {
        top: auto;
        left: auto;
        }
        @media (min-width: 768px) {
        .nav-justified > li {
            display: table-cell;
            width: 1%;
        }
        .nav-justified > li > a {
            margin-bottom: 0;
        }
        }
        .nav-tabs-justified {
        border-bottom: 0;
        }
        .nav-tabs-justified > li > a {
        margin-right: 0;
        border-radius: 4px;
        }
        .nav-tabs-justified > .active > a,
        .nav-tabs-justified > .active > a:hover,
        .nav-tabs-justified > .active > a:focus {
        border: 1px solid #ddd;
        }
        @media (min-width: 768px) {
        .nav-tabs-justified > li > a {
            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0;
        }
        .nav-tabs-justified > .active > a,
        .nav-tabs-justified > .active > a:hover,
        .nav-tabs-justified > .active > a:focus {
            border-bottom-color: #fff;
        }
        }
        .tab-content > .tab-pane {
        display: none;
        visibility: hidden;
        }
        .tab-content > .active {
        display: block;
        visibility: visible;
        }
        .nav-tabs .dropdown-menu {
        margin-top: -1px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
        .navbar {
        position: relative;
        min-height: 50px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        }
        @media (min-width: 768px) {
        .navbar {
            border-radius: 4px;
        }
        }
        @media (min-width: 768px) {
        .navbar-header {
            float: left;
        }
        }
        .navbar-collapse {
        padding-right: 15px;
        padding-left: 15px;
        overflow-x: visible;
        -webkit-overflow-scrolling: touch;
        border-top: 1px solid transparent;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
        }
        .navbar-collapse.in {
        overflow-y: auto;
        }
        @media (min-width: 768px) {
        .navbar-collapse {
            width: auto;
            border-top: 0;
            -webkit-box-shadow: none;
                    box-shadow: none;
        }
        .navbar-collapse.collapse {
            display: block !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
            visibility: visible !important;
        }
        .navbar-collapse.in {
            overflow-y: visible;
        }
        .navbar-fixed-top .navbar-collapse,
        .navbar-static-top .navbar-collapse,
        .navbar-fixed-bottom .navbar-collapse {
            padding-right: 0;
            padding-left: 0;
        }
        }
        .navbar-fixed-top .navbar-collapse,
        .navbar-fixed-bottom .navbar-collapse {
        max-height: 340px;
        }
        @media (max-device-width: 480px) and (orientation: landscape) {
        .navbar-fixed-top .navbar-collapse,
        .navbar-fixed-bottom .navbar-collapse {
            max-height: 200px;
        }
        }
        .container > .navbar-header,
        .container-fluid > .navbar-header,
        .container > .navbar-collapse,
        .container-fluid > .navbar-collapse {
        margin-right: -15px;
        margin-left: -15px;
        }
        @media (min-width: 768px) {
        .container > .navbar-header,
        .container-fluid > .navbar-header,
        .container > .navbar-collapse,
        .container-fluid > .navbar-collapse {
            margin-right: 0;
            margin-left: 0;
        }
        }
        .navbar-static-top {
        z-index: 1000;
        border-width: 0 0 1px;
        }
        @media (min-width: 768px) {
        .navbar-static-top {
            border-radius: 0;
        }
        }
        .navbar-fixed-top,
        .navbar-fixed-bottom {
        position: fixed;
        right: 0;
        left: 0;
        z-index: 1030;
        }
        @media (min-width: 768px) {
        .navbar-fixed-top,
        .navbar-fixed-bottom {
            border-radius: 0;
        }
        }
        .navbar-fixed-top {
        top: 0;
        border-width: 0 0 1px;
        }
        .navbar-fixed-bottom {
        bottom: 0;
        margin-bottom: 0;
        border-width: 1px 0 0;
        }
        .navbar-brand {
        float: left;
        height: 50px;
        padding: 15px 15px;
        font-size: 18px;
        line-height: 20px;
        }
        .navbar-brand:hover,
        .navbar-brand:focus {
        text-decoration: none;
        }
        .navbar-brand > img {
        display: block;
        }
        @media (min-width: 768px) {
        .navbar > .container .navbar-brand,
        .navbar > .container-fluid .navbar-brand {
            margin-left: -15px;
        }
        }
        .navbar-toggle {
        position: relative;
        float: right;
        padding: 9px 10px;
        margin-top: 8px;
        margin-right: 15px;
        margin-bottom: 8px;
        background-color: transparent;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        }
        .navbar-toggle:focus {
        outline: 0;
        }
        .navbar-toggle .icon-bar {
        display: block;
        width: 22px;
        height: 2px;
        border-radius: 1px;
        }
        .navbar-toggle .icon-bar + .icon-bar {
        margin-top: 4px;
        }
        @media (min-width: 768px) {
        .navbar-toggle {
            display: none;
        }
        }
        .navbar-nav {
        margin: 7.5px -15px;
        }
        .navbar-nav > li > a {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 20px;
        }
        @media (max-width: 767px) {
        .navbar-nav .open .dropdown-menu {
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
            background-color: transparent;
            border: 0;
            -webkit-box-shadow: none;
                    box-shadow: none;
        }
        .navbar-nav .open .dropdown-menu > li > a,
        .navbar-nav .open .dropdown-menu .dropdown-header {
            padding: 5px 15px 5px 25px;
        }
        .navbar-nav .open .dropdown-menu > li > a {
            line-height: 20px;
        }
        .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-nav .open .dropdown-menu > li > a:focus {
            background-image: none;
        }
        }
        @media (min-width: 768px) {
        .navbar-nav {
            float: left;
            margin: 0;
        }
        .navbar-nav > li {
            float: left;
        }
        .navbar-nav > li > a {
            padding-top: 15px;
            padding-bottom: 15px;
        }
        }
        .navbar-form {
        padding: 10px 15px;
        margin-top: 8px;
        margin-right: -15px;
        margin-bottom: 8px;
        margin-left: -15px;
        border-top: 1px solid transparent;
        border-bottom: 1px solid transparent;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
        }
        @media (min-width: 768px) {
        .navbar-form .form-group {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
        }
        .navbar-form .form-control {
            display: inline-block;
            width: auto;
            vertical-align: middle;
        }
        .navbar-form .form-control-static {
            display: inline-block;
        }
        .navbar-form .input-group {
            display: inline-table;
            vertical-align: middle;
        }
        .navbar-form .input-group .input-group-addon,
        .navbar-form .input-group .input-group-btn,
        .navbar-form .input-group .form-control {
            width: auto;
        }
        .navbar-form .input-group > .form-control {
            width: 100%;
        }
        .navbar-form .control-label {
            margin-bottom: 0;
            vertical-align: middle;
        }
        .navbar-form .radio,
        .navbar-form .checkbox {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 0;
            vertical-align: middle;
        }
        .navbar-form .radio label,
        .navbar-form .checkbox label {
            padding-left: 0;
        }
        .navbar-form .radio input[type="radio"],
        .navbar-form .checkbox input[type="checkbox"] {
            position: relative;
            margin-left: 0;
        }
        .navbar-form .has-feedback .form-control-feedback {
            top: 0;
        }
        }
        @media (max-width: 767px) {
        .navbar-form .form-group {
            margin-bottom: 5px;
        }
        .navbar-form .form-group:last-child {
            margin-bottom: 0;
        }
        }
        @media (min-width: 768px) {
        .navbar-form {
            width: auto;
            padding-top: 0;
            padding-bottom: 0;
            margin-right: 0;
            margin-left: 0;
            border: 0;
            -webkit-box-shadow: none;
                    box-shadow: none;
        }
        }
        .navbar-nav > li > .dropdown-menu {
        margin-top: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
        .navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }
        .navbar-btn {
        margin-top: 8px;
        margin-bottom: 8px;
        }
        .navbar-btn.btn-sm {
        margin-top: 10px;
        margin-bottom: 10px;
        }
        .navbar-btn.btn-xs {
        margin-top: 14px;
        margin-bottom: 14px;
        }
        .navbar-text {
        margin-top: 15px;
        margin-bottom: 15px;
        }
        @media (min-width: 768px) {
        .navbar-text {
            float: left;
            margin-right: 15px;
            margin-left: 15px;
        }
        }
        @media (min-width: 768px) {
        .navbar-left {
            float: left !important;
        }
        .navbar-right {
            float: right !important;
            margin-right: -15px;
        }
        .navbar-right ~ .navbar-right {
            margin-right: 0;
        }
        }
        .navbar-default {
        background-color: #f8f8f8;
        border-color: #e7e7e7;
        }
        .navbar-default .navbar-brand {
        color: #777;
        }
        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
        color: #5e5e5e;
        background-color: transparent;
        }
        .navbar-default .navbar-text {
        color: #777;
        }
        .navbar-default .navbar-nav > li > a {
        color: #777;
        }
        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
        color: #333;
        background-color: transparent;
        }
        .navbar-default .navbar-nav > .active > a,
        .navbar-default .navbar-nav > .active > a:hover,
        .navbar-default .navbar-nav > .active > a:focus {
        color: #555;
        background-color: #e7e7e7;
        }
        .navbar-default .navbar-nav > .disabled > a,
        .navbar-default .navbar-nav > .disabled > a:hover,
        .navbar-default .navbar-nav > .disabled > a:focus {
        color: #ccc;
        background-color: transparent;
        }
        .navbar-default .navbar-toggle {
        border-color: #ddd;
        }
        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
        background-color: #ddd;
        }
        .navbar-default .navbar-toggle .icon-bar {
        background-color: #888;
        }
        .navbar-default .navbar-collapse,
        .navbar-default .navbar-form {
        border-color: #e7e7e7;
        }
        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus {
        color: #555;
        background-color: #e7e7e7;
        }
        @media (max-width: 767px) {
        .navbar-default .navbar-nav .open .dropdown-menu > li > a {
            color: #777;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #333;
            background-color: transparent;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
            color: #555;
            background-color: #e7e7e7;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a,
        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus {
            color: #ccc;
            background-color: transparent;
        }
        }
        .navbar-default .navbar-link {
        color: #777;
        }
        .navbar-default .navbar-link:hover {
        color: #333;
        }
        .navbar-default .btn-link {
        color: #777;
        }
        .navbar-default .btn-link:hover,
        .navbar-default .btn-link:focus {
        color: #333;
        }
        .navbar-default .btn-link[disabled]:hover,
        fieldset[disabled] .navbar-default .btn-link:hover,
        .navbar-default .btn-link[disabled]:focus,
        fieldset[disabled] .navbar-default .btn-link:focus {
        color: #ccc;
        }
        .navbar-inverse {
        background-color: #222;
        border-color: #080808;
        }
        .navbar-inverse .navbar-brand {
        color: #9d9d9d;
        }
        .navbar-inverse .navbar-brand:hover,
        .navbar-inverse .navbar-brand:focus {
        color: #fff;
        background-color: transparent;
        }
        .navbar-inverse .navbar-text {
        color: #9d9d9d;
        }
        .navbar-inverse .navbar-nav > li > a {
        color: #9d9d9d;
        }
        .navbar-inverse .navbar-nav > li > a:hover,
        .navbar-inverse .navbar-nav > li > a:focus {
        color: #fff;
        background-color: transparent;
        }
        .navbar-inverse .navbar-nav > .active > a,
        .navbar-inverse .navbar-nav > .active > a:hover,
        .navbar-inverse .navbar-nav > .active > a:focus {
        color: #fff;
        background-color: #080808;
        }
        .navbar-inverse .navbar-nav > .disabled > a,
        .navbar-inverse .navbar-nav > .disabled > a:hover,
        .navbar-inverse .navbar-nav > .disabled > a:focus {
        color: #444;
        background-color: transparent;
        }
        .navbar-inverse .navbar-toggle {
        border-color: #333;
        }
        .navbar-inverse .navbar-toggle:hover,
        .navbar-inverse .navbar-toggle:focus {
        background-color: #333;
        }
        .navbar-inverse .navbar-toggle .icon-bar {
        background-color: #fff;
        }
        .navbar-inverse .navbar-collapse,
        .navbar-inverse .navbar-form {
        border-color: #101010;
        }
        .navbar-inverse .navbar-nav > .open > a,
        .navbar-inverse .navbar-nav > .open > a:hover,
        .navbar-inverse .navbar-nav > .open > a:focus {
        color: #fff;
        background-color: #080808;
        }
        @media (max-width: 767px) {
        .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
            border-color: #080808;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu .divider {
            background-color: #080808;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
            color: #9d9d9d;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #fff;
            background-color: transparent;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
            color: #fff;
            background-color: #080808;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
            color: #444;
            background-color: transparent;
        }
        }
        .navbar-inverse .navbar-link {
        color: #9d9d9d;
        }
        .navbar-inverse .navbar-link:hover {
        color: #fff;
        }
        .navbar-inverse .btn-link {
        color: #9d9d9d;
        }
        .navbar-inverse .btn-link:hover,
        .navbar-inverse .btn-link:focus {
        color: #fff;
        }
        .navbar-inverse .btn-link[disabled]:hover,
        fieldset[disabled] .navbar-inverse .btn-link:hover,
        .navbar-inverse .btn-link[disabled]:focus,
        fieldset[disabled] .navbar-inverse .btn-link:focus {
        color: #444;
        }
        .breadcrumb {
        padding: 8px 15px;
        margin-bottom: 20px;
        list-style: none;
        background-color: #f5f5f5;
        border-radius: 4px;
        }
        .breadcrumb > li {
        display: inline-block;
        }
        .breadcrumb > li + li:before {
        padding: 0 5px;
        color: #ccc;
        content: "/\00a0";
        }
        .breadcrumb > .active {
        color: #777;
        }
        .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
        }
        .pagination > li {
        display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #428bca;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
        color: #2a6496;
        background-color: #eee;
        border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #428bca;
        border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
        }
        .pagination-lg > li > a,
        .pagination-lg > li > span {
        padding: 10px 16px;
        font-size: 18px;
        }
        .pagination-lg > li:first-child > a,
        .pagination-lg > li:first-child > span {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
        }
        .pagination-lg > li:last-child > a,
        .pagination-lg > li:last-child > span {
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
        }
        .pagination-sm > li > a,
        .pagination-sm > li > span {
        padding: 5px 10px;
        font-size: 12px;
        }
        .pagination-sm > li:first-child > a,
        .pagination-sm > li:first-child > span {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .pagination-sm > li:last-child > a,
        .pagination-sm > li:last-child > span {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        }
        .pager {
        padding-left: 0;
        margin: 20px 0;
        text-align: center;
        list-style: none;
        }
        .pager li {
        display: inline;
        }
        .pager li > a,
        .pager li > span {
        display: inline-block;
        padding: 5px 14px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 15px;
        }
        .pager li > a:hover,
        .pager li > a:focus {
        text-decoration: none;
        background-color: #eee;
        }
        .pager .next > a,
        .pager .next > span {
        float: right;
        }
        .pager .previous > a,
        .pager .previous > span {
        float: left;
        }
        .pager .disabled > a,
        .pager .disabled > a:hover,
        .pager .disabled > a:focus,
        .pager .disabled > span {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        }
        .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: bold;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
        }
        a.label:hover,
        a.label:focus {
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        }
        .label:empty {
        display: none;
        }
        .btn .label {
        position: relative;
        top: -1px;
        }
        .label-default {
        background-color: #777;
        }
        .label-default[href]:hover,
        .label-default[href]:focus {
        background-color: #5e5e5e;
        }
        .label-primary {
        background-color: #428bca;
        }
        .label-primary[href]:hover,
        .label-primary[href]:focus {
        background-color: #3071a9;
        }
        .label-success {
        background-color: #5cb85c;
        }
        .label-success[href]:hover,
        .label-success[href]:focus {
        background-color: #449d44;
        }
        .label-info {
        background-color: #529fe7;
        }
        .label-info[href]:hover,
        .label-info[href]:focus {
        background-color: #31b0d5;
        }
        .label-warning {
        background-color: #f0ad4e;
        }
        .label-warning[href]:hover,
        .label-warning[href]:focus {
        background-color: #ec971f;
        }
        .label-danger {
        background-color: #d9534f;
        }
        .label-danger[href]:hover,
        .label-danger[href]:focus {
        background-color: #c9302c;
        }
        .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: bold;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        background-color: #777;
        border-radius: 10px;
        }
        .badge:empty {
        display: none;
        }
        .btn .badge {
        position: relative;
        top: -1px;
        }
        .btn-xs .badge {
        top: 0;
        padding: 1px 5px;
        }
        a.badge:hover,
        a.badge:focus {
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        }
        a.list-group-item.active > .badge,
        .nav-pills > .active > a > .badge {
        color: #428bca;
        background-color: #fff;
        }
        .nav-pills > li > a > .badge {
        margin-left: 3px;
        }
        .jumbotron {
        padding: 30px 15px;
        margin-bottom: 30px;
        color: inherit;
        background-color: #eee;
        }
        .jumbotron h1,
        .jumbotron .h1 {
        color: inherit;
        }
        .jumbotron p {
        margin-bottom: 15px;
        font-size: 21px;
        font-weight: 200;
        }
        .jumbotron > hr {
        border-top-color: #d5d5d5;
        }
        .container .jumbotron,
        .container-fluid .jumbotron {
        border-radius: 6px;
        }
        .jumbotron .container {
        max-width: 100%;
        }
        @media screen and (min-width: 768px) {
        .jumbotron {
            padding: 48px 0;
        }
        .container .jumbotron {
            padding-right: 60px;
            padding-left: 60px;
        }
        .jumbotron h1,
        .jumbotron .h1 {
            font-size: 63px;
        }
        }
        .thumbnail {
        display: block;
        padding: 4px;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: border .2s ease-in-out;
            -o-transition: border .2s ease-in-out;
                transition: border .2s ease-in-out;
        }
        .thumbnail > img,
        .thumbnail a > img {
        margin-right: auto;
        margin-left: auto;
        }
        a.thumbnail:hover,
        a.thumbnail:focus,
        a.thumbnail.active {
        border-color: #428bca;
        }
        .thumbnail .caption {
        padding: 9px;
        color: #333;
        }
        .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        }
        .alert h4 {
        margin-top: 0;
        color: inherit;
        }
        .alert .alert-link {
        font-weight: bold;
        }
        .alert > p,
        .alert > ul {
        margin-bottom: 0;
        }
        .alert > p + p {
        margin-top: 5px;
        }
        .alert-dismissable,
        .alert-dismissible {
        padding-right: 35px;
        }
        .alert-dismissable .close,
        .alert-dismissible .close {
        position: relative;
        top: -2px;
        right: -21px;
        color: inherit;
        }
        .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
        }
        .alert-success hr {
        border-top-color: #c9e2b3;
        }
        .alert-success .alert-link {
        color: #2b542c;
        }
        .alert-info {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1;
        }
        .alert-info hr {
        border-top-color: #a6e1ec;
        }
        .alert-info .alert-link {
        color: #245269;
        }
        .alert-warning {
        color: #8a6d3b;
        background-color: #fcf8e3;
        border-color: #faebcc;
        }
        .alert-warning hr {
        border-top-color: #f7e1b5;
        }
        .alert-warning .alert-link {
        color: #66512c;
        }
        .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
        }
        .alert-danger hr {
        border-top-color: #e4b9c0;
        }
        .alert-danger .alert-link {
        color: #843534;
        }
        @-webkit-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0;
        }
        to {
            background-position: 0 0;
        }
        }
        @-o-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0;
        }
        to {
            background-position: 0 0;
        }
        }
        @keyframes progress-bar-stripes {
        from {
            background-position: 40px 0;
        }
        to {
            background-position: 0 0;
        }
        }
        .progress {
        height: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        }
        .progress-bar {
        float: left;
        width: 0;
        height: 100%;
        font-size: 12px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        background-color: #428bca;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
                box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
        -webkit-transition: width .6s ease;
            -o-transition: width .6s ease;
                transition: width .6s ease;
        }
        .progress-striped .progress-bar,
        .progress-bar-striped {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        -webkit-background-size: 40px 40px;
                background-size: 40px 40px;
        }
        .progress.active .progress-bar,
        .progress-bar.active {
        -webkit-animation: progress-bar-stripes 2s linear infinite;
            -o-animation: progress-bar-stripes 2s linear infinite;
                animation: progress-bar-stripes 2s linear infinite;
        }
        .progress-bar-success {
        background-color: #5cb85c;
        }
        .progress-striped .progress-bar-success {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .progress-bar-info {
        background-color: #529fe7;
        }
        .progress-striped .progress-bar-info {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .progress-bar-warning {
        background-color: #f0ad4e;
        }
        .progress-striped .progress-bar-warning {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .progress-bar-danger {
        background-color: #d9534f;
        }
        .progress-striped .progress-bar-danger {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .media {
        margin-top: 15px;
        }
        .media:first-child {
        margin-top: 0;
        }
        .media-right,
        .media > .pull-right {
        padding-left: 10px;
        }
        .media-left,
        .media > .pull-left {
        padding-right: 10px;
        }
        .media-left,
        .media-right,
        .media-body {
        display: table-cell;
        vertical-align: top;
        }
        .media-middle {
        vertical-align: middle;
        }
        .media-bottom {
        vertical-align: bottom;
        }
        .media-heading {
        margin-top: 0;
        margin-bottom: 5px;
        }
        .media-list {
        padding-left: 0;
        list-style: none;
        }
        .list-group {
        padding-left: 0;
        margin-bottom: 20px;
        }
        .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
        }
        .list-group-item:first-child {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        }
        .list-group-item:last-child {
        margin-bottom: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
        }
        .list-group-item > .badge {
        float: right;
        }
        .list-group-item > .badge + .badge {
        margin-right: 5px;
        }
        a.list-group-item {
        color: #555;
        }
        a.list-group-item .list-group-item-heading {
        color: #333;
        }
        a.list-group-item:hover,
        a.list-group-item:focus {
        color: #555;
        text-decoration: none;
        background-color: #f5f5f5;
        }
        .list-group-item.disabled,
        .list-group-item.disabled:hover,
        .list-group-item.disabled:focus {
        color: #777;
        cursor: not-allowed;
        background-color: #eee;
        }
        .list-group-item.disabled .list-group-item-heading,
        .list-group-item.disabled:hover .list-group-item-heading,
        .list-group-item.disabled:focus .list-group-item-heading {
        color: inherit;
        }
        .list-group-item.disabled .list-group-item-text,
        .list-group-item.disabled:hover .list-group-item-text,
        .list-group-item.disabled:focus .list-group-item-text {
        color: #777;
        }
        .list-group-item.active,
        .list-group-item.active:hover,
        .list-group-item.active:focus {
        z-index: 2;
        color: #fff;
        background-color: #428bca;
        border-color: #428bca;
        }
        .list-group-item.active .list-group-item-heading,
        .list-group-item.active:hover .list-group-item-heading,
        .list-group-item.active:focus .list-group-item-heading,
        .list-group-item.active .list-group-item-heading > small,
        .list-group-item.active:hover .list-group-item-heading > small,
        .list-group-item.active:focus .list-group-item-heading > small,
        .list-group-item.active .list-group-item-heading > .small,
        .list-group-item.active:hover .list-group-item-heading > .small,
        .list-group-item.active:focus .list-group-item-heading > .small {
        color: inherit;
        }
        .list-group-item.active .list-group-item-text,
        .list-group-item.active:hover .list-group-item-text,
        .list-group-item.active:focus .list-group-item-text {
        color: #e1edf7;
        }
        .list-group-item-success {
        color: #3c763d;
        background-color: #dff0d8;
        }
        a.list-group-item-success {
        color: #3c763d;
        }
        a.list-group-item-success .list-group-item-heading {
        color: inherit;
        }
        a.list-group-item-success:hover,
        a.list-group-item-success:focus {
        color: #3c763d;
        background-color: #d0e9c6;
        }
        a.list-group-item-success.active,
        a.list-group-item-success.active:hover,
        a.list-group-item-success.active:focus {
        color: #fff;
        background-color: #3c763d;
        border-color: #3c763d;
        }
        .list-group-item-info {
        color: #31708f;
        background-color: #d9edf7;
        }
        a.list-group-item-info {
        color: #31708f;
        }
        a.list-group-item-info .list-group-item-heading {
        color: inherit;
        }
        a.list-group-item-info:hover,
        a.list-group-item-info:focus {
        color: #31708f;
        background-color: #c4e3f3;
        }
        a.list-group-item-info.active,
        a.list-group-item-info.active:hover,
        a.list-group-item-info.active:focus {
        color: #fff;
        background-color: #31708f;
        border-color: #31708f;
        }
        .list-group-item-warning {
        color: #8a6d3b;
        background-color: #fcf8e3;
        }
        a.list-group-item-warning {
        color: #8a6d3b;
        }
        a.list-group-item-warning .list-group-item-heading {
        color: inherit;
        }
        a.list-group-item-warning:hover,
        a.list-group-item-warning:focus {
        color: #8a6d3b;
        background-color: #faf2cc;
        }
        a.list-group-item-warning.active,
        a.list-group-item-warning.active:hover,
        a.list-group-item-warning.active:focus {
        color: #fff;
        background-color: #8a6d3b;
        border-color: #8a6d3b;
        }
        .list-group-item-danger {
        color: #a94442;
        background-color: #f2dede;
        }
        a.list-group-item-danger {
        color: #a94442;
        }
        a.list-group-item-danger .list-group-item-heading {
        color: inherit;
        }
        a.list-group-item-danger:hover,
        a.list-group-item-danger:focus {
        color: #a94442;
        background-color: #ebcccc;
        }
        a.list-group-item-danger.active,
        a.list-group-item-danger.active:hover,
        a.list-group-item-danger.active:focus {
        color: #fff;
        background-color: #a94442;
        border-color: #a94442;
        }
        .list-group-item-heading {
        margin-top: 0;
        margin-bottom: 5px;
        }
        .list-group-item-text {
        margin-bottom: 0;
        line-height: 1.3;
        }
        .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }
        .panel-body {
        background-color: #ffffff;
        padding-top: 50px;
        padding-left: 20px;
        }
        .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        }
        .panel-heading > .dropdown .dropdown-toggle {
        color: inherit;
        }
        .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px;
        color: inherit;
        }
        .panel-title > a {
        color: inherit;
        }
        .panel-footer {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .panel > .list-group,
        .panel > .panel-collapse > .list-group {
        margin-bottom: 0;
        }
        .panel > .list-group .list-group-item,
        .panel > .panel-collapse > .list-group .list-group-item {
        border-width: 1px 0;
        border-radius: 0;
        }
        .panel > .list-group:first-child .list-group-item:first-child,
        .panel > .panel-collapse > .list-group:first-child .list-group-item:first-child {
        border-top: 0;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        }
        .panel > .list-group:last-child .list-group-item:last-child,
        .panel > .panel-collapse > .list-group:last-child .list-group-item:last-child {
        border-bottom: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .panel-heading + .list-group .list-group-item:first-child {
        border-top-width: 0;
        }
        .list-group + .panel-footer {
        border-top-width: 0;
        }
        .panel > .table,
        .panel > .table-responsive > .table,
        .panel > .panel-collapse > .table {
        margin-bottom: 0;
        }
        .panel > .table caption,
        .panel > .table-responsive > .table caption,
        .panel > .panel-collapse > .table caption {
        padding-right: 15px;
        padding-left: 15px;
        }
        .panel > .table:first-child,
        .panel > .table-responsive:first-child > .table:first-child {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        }
        .panel > .table:first-child > thead:first-child > tr:first-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        }
        .panel > .table:first-child > thead:first-child > tr:first-child td:first-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child td:first-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child,
        .panel > .table:first-child > thead:first-child > tr:first-child th:first-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child th:first-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child {
        border-top-left-radius: 3px;
        }
        .panel > .table:first-child > thead:first-child > tr:first-child td:last-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child td:last-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child,
        .panel > .table:first-child > thead:first-child > tr:first-child th:last-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child th:last-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child {
        border-top-right-radius: 3px;
        }
        .panel > .table:last-child,
        .panel > .table-responsive:last-child > .table:last-child {
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .panel > .table:last-child > tbody:last-child > tr:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child {
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .panel > .table:last-child > tbody:last-child > tr:last-child td:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
        .panel > .table:last-child > tbody:last-child > tr:last-child th:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child {
        border-bottom-left-radius: 3px;
        }
        .panel > .table:last-child > tbody:last-child > tr:last-child td:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
        .panel > .table:last-child > tbody:last-child > tr:last-child th:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child {
        border-bottom-right-radius: 3px;
        }
        .panel > .panel-body + .table,
        .panel > .panel-body + .table-responsive,
        .panel > .table + .panel-body,
        .panel > .table-responsive + .panel-body {
        border-top: 1px solid #ddd;
        }
        .panel > .table > tbody:first-child > tr:first-child th,
        .panel > .table > tbody:first-child > tr:first-child td {
        border-top: 0;
        }
        .panel > .table-bordered,
        .panel > .table-responsive > .table-bordered {
        border: 0;
        }
        .panel > .table-bordered > thead > tr > th:first-child,
        .panel > .table-responsive > .table-bordered > thead > tr > th:first-child,
        .panel > .table-bordered > tbody > tr > th:first-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > th:first-child,
        .panel > .table-bordered > tfoot > tr > th:first-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child,
        .panel > .table-bordered > thead > tr > td:first-child,
        .panel > .table-responsive > .table-bordered > thead > tr > td:first-child,
        .panel > .table-bordered > tbody > tr > td:first-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > td:first-child,
        .panel > .table-bordered > tfoot > tr > td:first-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child {
        border-left: 0;
        }
        .panel > .table-bordered > thead > tr > th:last-child,
        .panel > .table-responsive > .table-bordered > thead > tr > th:last-child,
        .panel > .table-bordered > tbody > tr > th:last-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > th:last-child,
        .panel > .table-bordered > tfoot > tr > th:last-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child,
        .panel > .table-bordered > thead > tr > td:last-child,
        .panel > .table-responsive > .table-bordered > thead > tr > td:last-child,
        .panel > .table-bordered > tbody > tr > td:last-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > td:last-child,
        .panel > .table-bordered > tfoot > tr > td:last-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child {
        border-right: 0;
        }
        .panel > .table-bordered > thead > tr:first-child > td,
        .panel > .table-responsive > .table-bordered > thead > tr:first-child > td,
        .panel > .table-bordered > tbody > tr:first-child > td,
        .panel > .table-responsive > .table-bordered > tbody > tr:first-child > td,
        .panel > .table-bordered > thead > tr:first-child > th,
        .panel > .table-responsive > .table-bordered > thead > tr:first-child > th,
        .panel > .table-bordered > tbody > tr:first-child > th,
        .panel > .table-responsive > .table-bordered > tbody > tr:first-child > th {
        border-bottom: 0;
        }
        .panel > .table-bordered > tbody > tr:last-child > td,
        .panel > .table-responsive > .table-bordered > tbody > tr:last-child > td,
        .panel > .table-bordered > tfoot > tr:last-child > td,
        .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td,
        .panel > .table-bordered > tbody > tr:last-child > th,
        .panel > .table-responsive > .table-bordered > tbody > tr:last-child > th,
        .panel > .table-bordered > tfoot > tr:last-child > th,
        .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th {
        border-bottom: 0;
        }
        .panel > .table-responsive {
        margin-bottom: 0;
        border: 0;
        }
        .panel-group {
        margin-bottom: 20px;
        }
        .panel-group .panel {
        margin-bottom: 0;
        border-radius: 4px;
        }
        .panel-group .panel + .panel {
        margin-top: 5px;
        }
        .panel-group .panel-heading {
        border-bottom: 0;
        }
        .panel-group .panel-heading + .panel-collapse > .panel-body,
        .panel-group .panel-heading + .panel-collapse > .list-group {
        border-top: 1px solid #ddd;
        }
        .panel-group .panel-footer {
        border-top: 0;
        }
        .panel-group .panel-footer + .panel-collapse .panel-body {
        border-bottom: 1px solid #ddd;
        }
        .panel-default {
        border-color: #ddd;
        }
        .panel-default > .panel-heading {
        color: #333;
        background-color: #f5f5f5;
        border-color: #ddd;
        }
        .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #ddd;
        }
        .panel-default > .panel-heading .badge {
        color: #f5f5f5;
        background-color: #333;
        }
        .panel-default > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #ddd;
        }
        .panel-primary {
        border-color: #428bca;
        }
        .panel-primary > .panel-heading {
        color: #fff;
        background-color: #428bca;
        border-color: #428bca;
        }
        .panel-primary > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #428bca;
        }
        .panel-primary > .panel-heading .badge {
        color: #428bca;
        background-color: #fff;
        }
        .panel-primary > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #428bca;
        }
        .panel-success {
        border-color: #d6e9c6;
        }
        .panel-success > .panel-heading {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
        }
        .panel-success > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #d6e9c6;
        }
        .panel-success > .panel-heading .badge {
        color: #dff0d8;
        background-color: #3c763d;
        }
        .panel-success > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #d6e9c6;
        }
        .panel-info {
        border-color: #bce8f1;
        }
        .panel-info > .panel-heading {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1;
        }
        .panel-info > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #bce8f1;
        }
        .panel-info > .panel-heading .badge {
        color: #d9edf7;
        background-color: #31708f;
        }
        .panel-info > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #bce8f1;
        }
        .panel-warning {
        border-color: #faebcc;
        }
        .panel-warning > .panel-heading {
        color: #8a6d3b;
        background-color: #fcf8e3;
        border-color: #faebcc;
        }
        .panel-warning > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #faebcc;
        }
        .panel-warning > .panel-heading .badge {
        color: #fcf8e3;
        background-color: #8a6d3b;
        }
        .panel-warning > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #faebcc;
        }
        .panel-danger {
        border-color: #ebccd1;
        }
        .panel-danger > .panel-heading {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
        }
        .panel-danger > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #ebccd1;
        }
        .panel-danger > .panel-heading .badge {
        color: #f2dede;
        background-color: #a94442;
        }
        .panel-danger > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #ebccd1;
        }
        .embed-responsive {
        position: relative;
        display: block;
        height: 0;
        padding: 0;
        overflow: hidden;
        }
        .embed-responsive .embed-responsive-item,
        .embed-responsive iframe,
        .embed-responsive embed,
        .embed-responsive object,
        .embed-responsive video {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
        }
        .embed-responsive.embed-responsive-16by9 {
        padding-bottom: 56.25%;
        }
        .embed-responsive.embed-responsive-4by3 {
        padding-bottom: 75%;
        }
        .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        }
        .well blockquote {
        border-color: #ddd;
        border-color: rgba(0, 0, 0, .15);
        }
        .well-lg {
        padding: 24px;
        border-radius: 6px;
        }
        .well-sm {
        padding: 9px;
        border-radius: 3px;
        }
        .close {
        float: right;
        font-size: 21px;
        font-weight: bold;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        filter: alpha(opacity=20);
        opacity: .2;
        }
        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        filter: alpha(opacity=50);
        opacity: .5;
        }
        button.close {
        -webkit-appearance: none;
        padding: 0;
        cursor: pointer;
        background: transparent;
        border: 0;
        }
        .modal-open {
        overflow: hidden;
        }
        .modal {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        display: none;
        overflow: hidden;
        -webkit-overflow-scrolling: touch;
        outline: 0;
        }
        .modal.fade .modal-dialog {
        -webkit-transition: -webkit-transform .3s ease-out;
            -o-transition:      -o-transform .3s ease-out;
                transition:         transform .3s ease-out;
        -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            -o-transform: translate(0, -25%);
                transform: translate(0, -25%);
        }
        .modal.in .modal-dialog {
        -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
                transform: translate(0, 0);
        }
        .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto;
        }
        .modal-dialog {
        position: relative;
        width: auto;
        margin: 10px;
        }
        .modal-content {
        position: relative;
        background-color: #fff;
        -webkit-background-clip: padding-box;
                background-clip: padding-box;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        outline: 0;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
                box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        }
        .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: #000;
        }
        .modal-backdrop.fade {
        filter: alpha(opacity=0);
        opacity: 0;
        }
        .modal-backdrop.in {
        filter: alpha(opacity=50);
        opacity: .5;
        }
        .modal-header {
        min-height: 16.42857143px;
        padding: 15px;
        border-bottom: 1px solid #e5e5e5;
        }
        .modal-header .close {
        margin-top: -2px;
        }
        .modal-title {
        margin: 0;
        line-height: 1.42857143;
        }
        .modal-body {
        position: relative;
        padding: 15px;
        }
        .modal-footer {
        padding: 15px;
        text-align: right;
        border-top: 1px solid #e5e5e5;
        }
        .modal-footer .btn + .btn {
        margin-bottom: 0;
        margin-left: 5px;
        }
        .modal-footer .btn-group .btn + .btn {
        margin-left: -1px;
        }
        .modal-footer .btn-block + .btn-block {
        margin-left: 0;
        }
        .modal-scrollbar-measure {
        position: absolute;
        top: -9999px;
        width: 50px;
        height: 50px;
        overflow: scroll;
        }
        @media (min-width: 768px) {
        .modal-dialog {
            width: 600px;
            margin: 30px auto;
        }
        .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }
        .modal-sm {
            width: 300px;
        }
        }
        @media (min-width: 992px) {
            .modal-lgbig {
            width: 800px;
        }
        .modal-lg {
            width: 400px;
        }
        }

        .tooltip {
        position: absolute;
        z-index: 1070;
        display: block;
        font-size: 12px;
        line-height: 1.4;
        visibility: visible;
        filter: alpha(opacity=0);
        opacity: 0;
        }
        .tooltip.in {
        filter: alpha(opacity=90);
        opacity: .9;
        }
        .tooltip.top {
        padding: 5px 0;
        margin-top: -3px;
        }
        .tooltip.right {
        padding: 0 5px;
        margin-left: 3px;
        }
        .tooltip.bottom {
        padding: 5px 0;
        margin-top: 3px;
        }
        .tooltip.left {
        padding: 0 5px;
        margin-left: -3px;
        }
        .tooltip-inner {
        max-width: 200px;
        padding: 3px 8px;
        color: #fff;
        text-align: center;
        text-decoration: none;
        background-color: #000;
        border-radius: 4px;
        }
        .tooltip-arrow {
        position: absolute;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        }
        .tooltip.top .tooltip-arrow {
        bottom: 0;
        left: 50%;
        margin-left: -5px;
        border-width: 5px 5px 0;
        border-top-color: #000;
        }
        .tooltip.top-left .tooltip-arrow {
        bottom: 0;
        left: 5px;
        border-width: 5px 5px 0;
        border-top-color: #000;
        }
        .tooltip.top-right .tooltip-arrow {
        right: 5px;
        bottom: 0;
        border-width: 5px 5px 0;
        border-top-color: #000;
        }
        .tooltip.right .tooltip-arrow {
        top: 50%;
        left: 0;
        margin-top: -5px;
        border-width: 5px 5px 5px 0;
        border-right-color: #000;
        }
        .tooltip.left .tooltip-arrow {
        top: 50%;
        right: 0;
        margin-top: -5px;
        border-width: 5px 0 5px 5px;
        border-left-color: #000;
        }
        .tooltip.bottom .tooltip-arrow {
        top: 0;
        left: 50%;
        margin-left: -5px;
        border-width: 0 5px 5px;
        border-bottom-color: #000;
        }
        .tooltip.bottom-left .tooltip-arrow {
        top: 0;
        left: 5px;
        border-width: 0 5px 5px;
        border-bottom-color: #000;
        }
        .tooltip.bottom-right .tooltip-arrow {
        top: 0;
        right: 5px;
        border-width: 0 5px 5px;
        border-bottom-color: #000;
        }
        .popover {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1060;
        display: none;
        max-width: 276px;
        padding: 1px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: left;
        white-space: normal;
        background-color: #fff;
        -webkit-background-clip: padding-box;
                background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
        .popover.top {
        margin-top: -10px;
        }
        .popover.right {
        margin-left: 10px;
        }
        .popover.bottom {
        margin-top: 10px;
        }
        .popover.left {
        margin-left: -10px;
        }
        .popover-title {
        padding: 8px 14px;
        margin: 0;
        font-size: 14px;
        background-color: #f7f7f7;
        border-bottom: 1px solid #ebebeb;
        border-radius: 5px 5px 0 0;
        }
        .popover-content {
        padding: 9px 14px;
        }
        .popover > .arrow,
        .popover > .arrow:after {
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        }
        .popover > .arrow {
        border-width: 11px;
        }
        .popover > .arrow:after {
        content: "";
        border-width: 10px;
        }
        .popover.top > .arrow {
        bottom: -11px;
        left: 50%;
        margin-left: -11px;
        border-top-color: #999;
        border-top-color: rgba(0, 0, 0, .25);
        border-bottom-width: 0;
        }
        .popover.top > .arrow:after {
        bottom: 1px;
        margin-left: -10px;
        content: " ";
        border-top-color: #fff;
        border-bottom-width: 0;
        }
        .popover.right > .arrow {
        top: 50%;
        left: -11px;
        margin-top: -11px;
        border-right-color: #999;
        border-right-color: rgba(0, 0, 0, .25);
        border-left-width: 0;
        }
        .popover.right > .arrow:after {
        bottom: -10px;
        left: 1px;
        content: " ";
        border-right-color: #fff;
        border-left-width: 0;
        }
        .popover.bottom > .arrow {
        top: -11px;
        left: 50%;
        margin-left: -11px;
        border-top-width: 0;
        border-bottom-color: #999;
        border-bottom-color: rgba(0, 0, 0, .25);
        }
        .popover.bottom > .arrow:after {
        top: 1px;
        margin-left: -10px;
        content: " ";
        border-top-width: 0;
        border-bottom-color: #fff;
        }
        .popover.left > .arrow {
        top: 50%;
        right: -11px;
        margin-top: -11px;
        border-right-width: 0;
        border-left-color: #999;
        border-left-color: rgba(0, 0, 0, .25);
        }
        .popover.left > .arrow:after {
        right: 1px;
        bottom: -10px;
        content: " ";
        border-right-width: 0;
        border-left-color: #fff;
        }
        .carousel {
        position: relative;
        }
        .carousel-inner {
        position: relative;
        width: 100%;
        overflow: hidden;
        }
        .carousel-inner > .item {
        position: relative;
        display: none;
        -webkit-transition: .6s ease-in-out left;
            -o-transition: .6s ease-in-out left;
                transition: .6s ease-in-out left;
        }
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
        line-height: 1;
        }
        @media all and (transform-3d), (-webkit-transform-3d) {
        .carousel-inner > .item {
            -webkit-transition: -webkit-transform .6s ease-in-out;
                -o-transition:      -o-transform .6s ease-in-out;
                    transition:         transform .6s ease-in-out;

            -webkit-backface-visibility: hidden;
                    backface-visibility: hidden;
            -webkit-perspective: 1000;
                    perspective: 1000;
        }
        .carousel-inner > .item.next,
        .carousel-inner > .item.active.right {
            left: 0;
            -webkit-transform: translate3d(100%, 0, 0);
                    transform: translate3d(100%, 0, 0);
        }
        .carousel-inner > .item.prev,
        .carousel-inner > .item.active.left {
            left: 0;
            -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
        }
        .carousel-inner > .item.next.left,
        .carousel-inner > .item.prev.right,
        .carousel-inner > .item.active {
            left: 0;
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
        }
        }
        .carousel-inner > .active,
        .carousel-inner > .next,
        .carousel-inner > .prev {
        display: block;
        }
        .carousel-inner > .active {
        left: 0;
        }
        .carousel-inner > .next,
        .carousel-inner > .prev {
        position: absolute;
        top: 0;
        width: 100%;
        }
        .carousel-inner > .next {
        left: 100%;
        }
        .carousel-inner > .prev {
        left: -100%;
        }
        .carousel-inner > .next.left,
        .carousel-inner > .prev.right {
        left: 0;
        }
        .carousel-inner > .active.left {
        left: -100%;
        }
        .carousel-inner > .active.right {
        left: 100%;
        }
        .carousel-control {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 15%;
        font-size: 20px;
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
        filter: alpha(opacity=50);
        opacity: .5;
        }
        .carousel-control.left {
        background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
        background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
        background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
        background-image:         linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
        background-repeat: repeat-x;
        }
        .carousel-control.right {
        right: 0;
        left: auto;
        background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
        background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
        background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
        background-image:         linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
        background-repeat: repeat-x;
        }
        .carousel-control:hover,
        .carousel-control:focus {
        color: #fff;
        text-decoration: none;
        filter: alpha(opacity=90);
        outline: 0;
        opacity: .9;
        }
        .carousel-control .icon-prev,
        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right {
        position: absolute;
        top: 50%;
        z-index: 5;
        display: inline-block;
        }
        .carousel-control .icon-prev,
        .carousel-control .glyphicon-chevron-left {
        left: 50%;
        margin-left: -10px;
        }
        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-right {
        right: 50%;
        margin-right: -10px;
        }
        .carousel-control .icon-prev,
        .carousel-control .icon-next {
        width: 20px;
        height: 20px;
        margin-top: -10px;
        font-family: serif;
        }
        .carousel-control .icon-prev:before {
        content: '\2039';
        }
        .carousel-control .icon-next:before {
        content: '\203a';
        }
        .carousel-indicators {
        position: absolute;
        bottom: 10px;
        left: 50%;
        z-index: 15;
        width: 60%;
        padding-left: 0;
        margin-left: -30%;
        text-align: center;
        list-style: none;
        }
        .carousel-indicators li {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin: 1px;
        text-indent: -999px;
        cursor: pointer;
        background-color: #000 \9;
        background-color: rgba(0, 0, 0, 0);
        border: 1px solid #fff;
        border-radius: 10px;
        }
        .carousel-indicators .active {
        width: 12px;
        height: 12px;
        margin: 0;
        background-color: #fff;
        }
        .carousel-caption {
        position: absolute;
        right: 15%;
        bottom: 20px;
        left: 15%;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
        }
        .carousel-caption .btn {
        text-shadow: none;
        }
        @media screen and (min-width: 768px) {
        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right,
        .carousel-control .icon-prev,
        .carousel-control .icon-next {
            width: 30px;
            height: 30px;
            margin-top: -15px;
            font-size: 30px;
        }
        .carousel-control .glyphicon-chevron-left,
        .carousel-control .icon-prev {
            margin-left: -15px;
        }
        .carousel-control .glyphicon-chevron-right,
        .carousel-control .icon-next {
            margin-right: -15px;
        }
        .carousel-caption {
            right: 20%;
            left: 20%;
            padding-bottom: 30px;
        }
        .carousel-indicators {
            bottom: 20px;
        }
        }
        .clearfix:before,
        .clearfix:after,
        .dl-horizontal dd:before,
        .dl-horizontal dd:after,
        .container:before,
        .container:after,
        .container-fluid:before,
        .container-fluid:after,
        .row:before,
        .row:after,
        .form-horizontal .form-group:before,
        .form-horizontal .form-group:after,
        .btn-toolbar:before,
        .btn-toolbar:after,
        .btn-group-vertical > .btn-group:before,
        .btn-group-vertical > .btn-group:after,
        .nav:before,
        .nav:after,
        .navbar:before,
        .navbar:after,
        .navbar-header:before,
        .navbar-header:after,
        .navbar-collapse:before,
        .navbar-collapse:after,
        .pager:before,
        .pager:after,
        .panel-body:before,
        .panel-body:after,
        .modal-footer:before,
        .modal-footer:after {
        display: table;
        content: " ";
        }
        .clearfix:after,
        .dl-horizontal dd:after,
        .container:after,
        .container-fluid:after,
        .row:after,
        .form-horizontal .form-group:after,
        .btn-toolbar:after,
        .btn-group-vertical > .btn-group:after,
        .nav:after,
        .navbar:after,
        .navbar-header:after,
        .navbar-collapse:after,
        .pager:after,
        .panel-body:after,
        .modal-footer:after {
        clear: both;
        }
        .center-block {
        display: block;
        margin-right: auto;
        margin-left: auto;
        }
        .pull-right {
        float: right !important;
        }
        .pull-left {
        float: left !important;
        }
        .hide {
        display: none !important;
        }
        .show {
        display: block !important;
        }
        .invisible {
        visibility: hidden;
        }
        .text-hide {
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
        }
        .hidden {
        display: none !important;
        visibility: hidden !important;
        }
        .affix {
        position: fixed;
        }
        @-ms-viewport {
        width: device-width;
        }
        .visible-xs,
        .visible-sm,
        .visible-md,
        .visible-lg {
        display: none !important;
        }
        .visible-xs-block,
        .visible-xs-inline,
        .visible-xs-inline-block,
        .visible-sm-block,
        .visible-sm-inline,
        .visible-sm-inline-block,
        .visible-md-block,
        .visible-md-inline,
        .visible-md-inline-block,
        .visible-lg-block,
        .visible-lg-inline,
        .visible-lg-inline-block {
        display: none !important;
        }
        @media (max-width: 767px) {
        .visible-xs {
            display: block !important;
        }
        table.visible-xs {
            display: table;
        }
        tr.visible-xs {
            display: table-row !important;
        }
        th.visible-xs,
        td.visible-xs {
            display: table-cell !important;
        }
        }
        @media (max-width: 767px) {
        .visible-xs-block {
            display: block !important;
        }
        }
        @media (max-width: 767px) {
        .visible-xs-inline {
            display: inline !important;
        }
        }
        @media (max-width: 767px) {
        .visible-xs-inline-block {
            display: inline-block !important;
        }
        }
        @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm {
            display: block !important;
        }
        table.visible-sm {
            display: table;
        }
        tr.visible-sm {
            display: table-row !important;
        }
        th.visible-sm,
        td.visible-sm {
            display: table-cell !important;
        }
        }
        @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm-block {
            display: block !important;
        }
        }
        @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm-inline {
            display: inline !important;
        }
        }
        @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm-inline-block {
            display: inline-block !important;
        }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md {
            display: block !important;
        }
        table.visible-md {
            display: table;
        }
        tr.visible-md {
            display: table-row !important;
        }
        th.visible-md,
        td.visible-md {
            display: table-cell !important;
        }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md-block {
            display: block !important;
        }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md-inline {
            display: inline !important;
        }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md-inline-block {
            display: inline-block !important;
        }
        }
        @media (min-width: 768px) {
        .visible-lg {
            display: block !important;
        }
        table.visible-lg {
            display: table;
        }
        tr.visible-lg {
            display: table-row !important;
        }
        th.visible-lg,
        td.visible-lg {
            display: table-cell !important;
        }
        }
        @media (min-width: 768px) {
        .visible-lg-block {
            display: block !important;
        }
        }
        @media (min-width: 768px) {
        .visible-lg-inline {
            display: inline !important;
        }
        }
        @media (min-width: 768px) {
        .visible-lg-inline-block {
            display: inline-block !important;
        }
        }
        @media (max-width: 767px) {
        .hidden-xs {
            display: none !important;
        }
        }
        @media (min-width: 768px) and (max-width: 991px) {
        .hidden-sm {
            display: none !important;
        }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-md {
            display: none !important;
        }
        }
        @media (min-width: 768px) {
        .hidden-lg {
            display: none !important;
        }
        }
        .visible-print {
        display: none !important;
        }
        @media print {
        .visible-print {
            display: block !important;
        }
        table.visible-print {
            display: table;
        }
        tr.visible-print {
            display: table-row !important;
        }
        th.visible-print,
        td.visible-print {
            display: table-cell !important;
        }
        }
        .visible-print-block {
        display: none !important;
        }
        @media print {
        .visible-print-block {
            display: block !important;
        }
        }
        .visible-print-inline {
        display: none !important;
        }
        @media print {
        .visible-print-inline {
            display: inline !important;
        }
        }
        .visible-print-inline-block {
        display: none !important;
        }
        @media print {
        .visible-print-inline-block {
            display: inline-block !important;
        }
        }
        @media print {
        .hidden-print {
            display: none !important;
        }
        }
        /*# sourceMappingURL=bootstrap.css.map */

        .gold{
        border: 3px solid #f9f9f9;
        border-radius: 5px 5px 5px 5px;
        
        }
        .omais{
            position: absolute;
            margin-left: -48px;
            margin-top: -25px;
        }
        sup{
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div id="contentarea" class="container connectSortable ui-sortable ui-droppable" style="background: rgb(255, 255, 255); border-width: 1px 0px 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; border-top-style: solid; border-top-color: rgb(241, 241, 241); max-height: 1200px; overflow: auto; zoom: 1; min-height: 50px;">
        <div class="ui-draggable"><div contenteditable="true">
    <p style="text-align: center;" contenteditable="true">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASUAAABrCAYAAAAxQpTfAAAgAElEQVR4Xu1dB3RVZdbdr/fkpQdIQiihJJDQe+8ogjqIDUEFG4jYHZ2Zf8ZxdHQEBQsWsNBUsKMIIoKUgPSEAGkQSEhPXtrL6+1f5zwCKS8NEJjhfmu5/n/Iu/d+99z77XvO+fbZR+TxeDwQhmABwQKCBa4RC4gEULpGnoQwDcECggXYAgIoCS+CYAHBAteUBQRQuqYehzAZwQKCBQRQEt4BwQKCBa4pCwigdE09jutrMi6HEfC4IJZpIRJJr6+bF+62UQsIoCS8HFfUAh6XDU57GaxlSbAZs6DUJ0AdOgBisfyKzkO42LVrAQGUrt1n8z81M4/TAothHyylB2EpOwi3+QwUwUPhH/MIlH6d/6fuVbiZS7OAAEqXZj/h6BZYgLwjY/bnqDj5EaxV6RBDBG3ULQjo+jgU/t1acAbhJ9eTBQRQup6e9lW4V4+bAOkrGNLehqX8OMQSJfTRMxDY4znINVFXYUZX75LEUiaAdjsqAY8HEkUARELY2uCBCKB09d7R//kre9wOGHO+hSF1CUzl6ZDIFPBrdyOCezwLhV/M//z919yg014Bp+ksHKZs2CpT4bJXQhUyBNrw0RBLVdeNHVp6owIotdRSwu9aZwGPC1VnN6A0dSksZeQhSaBrMwLBcS9AGdirdef6L/01gY/FcAjG/J/hKD8AOIsgkgRAFX4D/KLvgFzXgfjL/6V398dNWwClP8621+2ZPW4njHk/wnBiKcwVJ3jh6YLiEBT3PDRtxl01u1CZp8dlhstRBbe1FC5bKZwOEwVVHE7R/5XroqHQx10SRcFlL4OlLAnV+VtgLtoJuzEdEpEH6tCh8O94P1RhoyCRB1w1O1zrFxZA6Vp/Qv9l8/N4XDDmboAhdSnM5Rm81lWaYAR1Xwj/jvc0nkNhXLDB7bIDbpcXKERiSGRaQCS5eCt4PHA7q+Gw5MJelQ5rRToc1Vnw2AoYnJx227lzuwGPAwq/aPh3vA/q8IkQS1pHU3Dby2EuOwxz/i8wleyBrTITHmc1FNoITuz7Rd8Dpb77xd/LdXKkAErXyYO+ErfpdttgyvkehvS3Yao8CY9HAblcDn2HGQiKexYSmd/5aVC+yeOycn7FZTfAUX0GDtMZOK2FcLtsgNsJkVgMTegwqNtO4QR5a4bbUQ2HOQ/W8iTYK5Nhq0iDw5QLp60cLqcN7DWJRICnJnzywONxQyJyQh3YHYFdFkITMQUicfOkTqe1FFbDfliKtsJUcgBWYw5cdiMkUilUgQnQd5wNbcQUSOT61tzCdftbAZSu20d/eW+cgMSY8xXK09+BpTIbLpEaYpET2qDuCI5/Caqg3nDbKxl0nJZ8OExnYa/OgcOcA4+tCHZzMQOUx+P0hlIe8lzsUPp1gH+XR+EXMQ0iqbrJSVPY6LSVwlZ+FBbDftgIkIwn4STgczrhdhMASQGxFB6RGCKPCCLxhZyOhwDKbYFMZIF/+2kIin8JUmVIo9d02QwwGw7AXLAFlpK9sJny4XBYIYILclUQtG3Gwb/jTKgC+0Ekll1eg/8Pn00ApWvs4drtdkgkEv7vv2W4HSYYc9ahLON9WIxn4RH7QcRsJBvUgT3hFzkVcFlhrfJ6Kx6HAU5bBZz2arjddi8GQQxAci5UI6AQwQMXJO5qqPRdEBj3DHTtpkAkot/VHW6nGXZjFiyl+2Ax/A57xTHYLUVwOR1we8SASA4PJBCxZ0Rg5wJEbpLIAGhL/lx46E0ruSAVWeAXMRYhCS9Dqmrb4HqUi7KUHoCpYDMTQm2mQjgdLnjcLkikIij1neEXOR3+UX+CVN3w+P+W53q15imA0tWyfL3rGgwGHD9+AqeyshAYEICBAwciPDzsGpkdOS8e76KuN1z2ChhPr0VF1sewGAvgFlMdG3kFbgYbysvIpBLAbYXLYYXTRSDkYnDgszHIEHCIAbEKqONRiACXETKxG/qYBxEc93SdLXSXvRy2ymMwF+1mT8VadQpUT+cm3IEMoHkwENH1HOzBSMRiBnyPSM7ei9PlhpsOIDxiUHJCKnbAL2IiQuJfhFR14RmQZ2QxHIQ5/2eYSvfCbi6A0+kCeVgikRtKhQbqsCHwi74LquBhwnb/Rb69AihdpOEu12FlZWVIPpqCxMQ9OH7iBEpKiqFSqjBlyo246847odNpL9elLuo8xcXFSE1Lg7+/P+JiYyGTXQhDnNYSVGZ9jMqsNbCZy84BEuVgLoiZUp6GAIlBDW6vhyISQyZTQyL3g1iqgUQiZy/DZquEw2auNU8CJQtkMgn0XR5CcOyTfKzTUggbgUPxDljKDni9M4cNrnNARHkgAhqRxwaRyAmJRAypzA8SRQjk2ijINREQK9qyh2Qs2AqzIemcRyUF3A5IxXb4R01BSO9XIZFqQWBEOSNTwRaYS36HzVQAp8sDN6QQwQmJ2A2NXzR0kbdAG/knyLTtL8rWwkFeCwigdJXeBENZGVJSUrBnz+84mpICQ2kpXLSQRCJYLRZ079YNCxc+hp49e1yVGVZUVODYseP4+ectOJ6aionjx2P27HugVHoTznbTWVSe/ACV2V/DZjUC7CF5QyuCH/aCPOQtOThpLRa7IZEqIVeHQe4XA7l/d8g00ZApQyCR+cPtNMKYvRoVub/B4RBBJDkHfgRKCiUCOj8Av/a3wFaRBHM+hU1JsFsK4XI5KYMDERSAWMygIvLYIRK5IJWqoNBFQK7vAYU+Hgq/7pBpozjhLhKreFeuJOUVVGV/A4db4g3l3HZIJU74R9wIfdeFcFnyYcr7Dlaq26vOh8vpgluk8C4etxVKhRrq0CHw7+j1jprLe12Vh/lfdlEBlK7wA6PFnpx8FLsTE5GScgylBgN7ETKplL0QAiWz2Qy9Xo+5c+7HhAnjIabFdoVGRXklUo4fw57EROzbfwD5+QWIj++JOfffhwEDBzDY2CrTUJH5Hqpyf4TD7oBHrKmT63G7XRDDAZHbDpFEDLkiEAp9FyiD+kER2AcKXQwkymCIxMrzx7mdJpQd/SvKT38Lu0sGEW/HU7KJ8jRy3kqXyHVwVB6DvTofTt41kzOQkM3cbgfEHivEYg9k8gAo9d2gDBkMVdBABkHiBdXfSaMdupLkF1GZ8xUcLkqAE7g5IRaJoNB2gFwbAWd1JmzVp+FweuAh4CPA9dggkXqg8usIv4ip0EbcDJmu4xV6Qv/7lxFA6Qo948rKShw/fhw7du5CUvJR9owYjGQySKXSOvkaq9UKrVbLnsmUG2/kv/+Rg+ZRWlrKOa19+/YjKTkZ2Tk58Lg9GDp0MO6ZORM94+NBG1VU5V9GW/5Fv8HppNw07YhJQEuWPCLK3YhFDt4Ol6sioAzoBWXYMKiC+kGmbgMx/77hsJanoPjI8zCVHoVbrK4Fct6kN4VhcNvgcbs5H+TNPdFumRMiBiM35KpgKAISoAkfA1XIUMjU7ZqkEhBPqTTpJVTmfH3eU6L0OgWfYpEbYrcNLneNZySB2GOHWGSHTKmHOnQE/KNnQBU8ECKJUCpyOd9PAZQupzV9nMtkMuH4iePYvSsRhw8fQWFhIb/0cjmBkdczqt9QhkCJcjj33TsbkyZN/MN24lwuF4NR8tGj2Pf7fgbNwqIiWKxWBOj1GD16NGZM/xM6dKRyCA/MRdtRlvYOqov2e/M3DB6UICYwskHscUKm0EDh1wHKwAFQhY6EUt8TEmWIzyR5jbkoxKs4uRKGE0tgs1YDUnXD4gu6BsdMUu9OHV/TwslrhSoQ6qB+ULeZDFXIIMjUbSFqAeHSbsqBIen/UFWwA07yukSSWtd1Myh7k/BOiIgqIJNDFdgTusibmVxJ1xHG5beAAEqX36Z8RrPZgozMdOzatQeHDh1EXn4B3C4Xe0Y1YRqnXep1uKL/TaDUpk0bPPjgHAwbOqzJBX0x07fZbCgoKOQw8tChQ0hLT0dJSSlsdhukEgmi2rfHDZMnYuKEiQgKCuRkc3Xuj6g4tRzVhuNweVQAkRk9tFiJl0NgpIXKvyvUYSOgDB0FuX9XThK3ZNhN2Sg58jcYC36DW6T07prVSpZfOAd5TR6Q8gB5R3KFDsqABGgjboQmbAyk6nYtthWRNytPf4aytKWwmsqBOt6Od5eRfkPXoc1DhbY9NG0nQBsxDQp97CWVobTEJtfzbwRQusxP32a1IuPkSSTu2YsD+w8gNzcXTqezARjR7pDD6eRwhECqJm9E/06g1KVLF8yb9zB69rg8iW765lcbjTh9JhtHjiQhOTkZp0+fQWVVJew2G8RiEfQBAeiVEI+JEyehb98+UCoUTGg0nlmLyqxVsBhz4QKFKkQ89JIEpQod1PpYqMNHQx02EnJdJ4gaCdF8mZp25yqy1qDsxCJYLZUQSQjI6rcipKCK/plKUKyQSaRQ6rsyS1rbdgJkmo4tYl7Xvr6tIhUlyX+FsXgf3CLy+Gp2FSmP5QA8VkhEIsg1YVyzpm03Fcqg/pDIdJf5jRFOV98CAihdpneCgOfMmTPYk7gHiXt/R05ONmw2O+eDqNTiPOi43HC6HLA7vECl02p5+9rhcHAoRLwXq9WGPn16Y+HCBYiMiLikGZJXRMn09PR09oxOpKaiIL8A1dVEXCR+jghqtQqdOnXEyBEjMHz4MPbSaDjNuSg/9QmqzqyDzVIODwOSi3NGMrkfF65q2o6FNnQ0ZLoOF6UNZK1MQ0nyX2Aq2gcXNBCJ65NGCZDc7K1RCYhC046LenVRN7OXdDF6RKRpRHmxsvQP4HA44ZFoGGCJES6CHeJzjGzKF5EXpg4eyol5YVwZCwigdIl2JjDKz8vD7/v2Y3fiHpw6dYo9HQKjGg+IQjKnywWnw8Hb/rTTRgufvBGdToedO3chLy+PwYvyPAQkBA5PPP4Y/P1bVy9V42mRB5SdnYPU1HSkpafhzOnTKCur4LmRJ0LzU6vViIyMQN++fTFs6BB06tSJ50DDVnEMFZkfoursT7DbTZxYpkp3qUILhb4HNOHjoQkbxVX1FwMMdA23w+IFh5MfwmF3AgwONV7SuVCNCnRhhUKu4aSyX/vboA4bfvF1ZB4XTIU7UHLsX7CUZcBNhE2Pi0NQqUQMmSoIyoB4qMMnsOcnI0a3oC5yiaukdYcLoNQ6e53/NS3+goICHDh4ELt37UZ6ZiZM1aY6nhH9hkCLvCAaGo0Gbdu1Rc+4Hhg4cADi4mJx5kw2Fr/xJrKysvjvNWFdXGx3TJt6E4OXWqNh8FLI5XV26tweD9d00deeEuqlpSXIy89HTk4Oh2YEdCUlBqYYENhRUp1Ax1/vj/ZRkeiVkIAB/fsjumM0Eza9w82LtjLzAxiLdsPBZS8yyFV+UPjHQd12PDShY1gLqCXFqk2Ztzr/VxiOvQhzZRY8YgqLalY/Jf9dnK+Sil2Q09Z75M3QRt4MuZaS7hc/iAVeeuwVTqw7XSKIpQpOYFM5iCqwD++qqYIGcH6KXVdhXHELCKDUQpOTt0MeDHkapaUGHDt2DPv270dqahqMRiOLmMnP8YxcLsoXOThfRCUNAfoAdOzYAfEJPZEQn4D27aMYgGicOpWF/yxahBPHU5m9TR4MgQ15U0QL0GrV8NfrERgQBD8/DbRanRdAPIDFaoGxuhpmkxkVlZW8s1deXgaj0QSLxczemZjZ0zIO0cLCQtkb6tmzJ3rExaFt2zbnyZAMR04T6yCRh2QpPQw3JJCpgqHWd4c6bCzUbcYxH+dydB6hgtzSoy+iKu9nOEF8pQsyIR7iN8EMhVwHTfhI+LW/HaqQwZdl693tMqMyay0qTy6Hy2Vl/pMysA+UQQOh8O8JqSJQAKMWrok/6mcCKDViWS8I2WEyVaO4uIQXPHkh+fn5nLzOzc1DVVUVc5fFUir2pEVN+SJiL4uh1WgR3iYc3bp2RUJCPLp0iUFoSAhk58KjmsvSOdav/wrffPcdJ6KJMU1A5nZTyEf1WkRUpjyLCGKJiEFLKqHyBsDucIAKeMm7Ik/Imzj38PWVSgU0Gi0CgwLQPioKnTt1Qvfu3dA+OhoBAQFcA1Z7OCyFqDqzBhWnPoW9KhsSRRBUQfFc6a4OG3cuge1lMl/qIMmS8sz3UJb+PuykZyT2ArS3JMUMicgFdUAMdJHToY2YCpkm8lIvWed48pbMJYnwOG1QBvSAVB0JcTMKBJd1AsLJmrSAAEr1zEMJ4IzMDA6rCguKUFRUhILCQvZEKAyyms28+CkUosVPHtI5PTJolBoEhwQhOro9YmNjERsXi4h2EdBqvYuusVFUVIyNG3/Crt27GfwIbAjsmMZHImVUrkGkQfo3N+n+eFUSadAcqLyDgVCrQWBgAAIDAhHRrh2io6PRoWM0oqIiodP5nc8X1Z4HeSVEXCTPwVywAU6HDfKAXtC2mQxtm/HcbUQkuTxg5EUeN6oLNqP02MswV2QDEtJYEsNDpSEeM2QyJTQhI6DvfA9UwUPPMbv/mFVMFhQCtD/GtpdyVgGU6lnv5MlT+HDFchw6eBh2uwNUMkHhFGGAWOKtMJfJpJzfoVyERq1BaFgIIiLaoWOHjojp3JnzRkR+bA0Tm3hNmZmZOJpyFDk5Z1FWVo6KikqYzCa4XBQKEj/HuxNFgEjnpp07fYCerxUYGIg2bcIZjMLCwpj8qFKr6xTQNnhRPB6YS/ag6uS7sJUlQaQMhyp0FDTtJkPpH/eHeA9UolKa8iKqCnbC5aGwjUDdBonYCaVfe+giboUuajrk2uhLea+FY/+LLSCAUr2HR1X7VIRKpRYECpSopipzGqSEqFapEaD3Z05PSEgI2rVtyztYwcHBvJt1qTpIlBSnpDWVpRgM5ed5RPTv9B95SbxzplEjUB+IoOBAzjNRzoiS2K25PpEDTYXbYK84DKm6A+T+CZBr20Msa1pM7VLe98qc71By5M+sdySW6thzksoVUAf1gV+HWVCHj4NYKNu4FBP/1x8rgFJD94FzSdUmE6oqK2Eymc9p8ng9FEpQUwJaoVBCoZD7DIku51vBThpX23vDOA4VRSIGH1/6Rq25Np/XaeIYhgHiCozqor0oO/FvuK35XLEvVoRA6dcNmrDxkOvjhCTzFXgG1/olBFC61p/Q/9j8aIfPWnaUpUpkmghOqEtk+subt/ofs9n1djsCKF1vT1y4X8EC17gFBFC6xh+QMD3BAtebBQRQut6euHC/ggWucQsIoHSNPyBheoIFrjcLCKB0vT1x4X4FC1zjFhBA6Rp/QML0BAtcbxYQQOl6e+LC/QoWuMYtIIDSNf6AhOkJFrjeLCCA0vX2xIX7FSxwjVtAAKVr/AEJ0xMscL1ZQACl6+2JC/crWOAat4AAStf4AxKmJ1jgerOAAErX2xMX7lewwDVuAQGUrvEHJExPsMD1ZgEBlK63Jy7cr2CBa9wCAihd4w9ImJ5ggevNAgIoXW9PXLhfwQLXuAUEULrGH5AwPcEC15sFBFC63p64cL+CBa5xCzQLStTskHqhUcND6pbh7TPG7chgtdr4bzablXuPUUcN6i+m0ahb1V6oKRtRV1rq7kGdQqhRY2OD5ldRUcEdY+VSGfdj87hd3CiSusTSvKlTbI3YPgnxU6cS6iJL/z/1VaMWSk6HC06ng9sWUavs+uL8ZA/q00a94Ki5gEImRWBQEEJDQ+Gn09VpaURzoq4kZCNvl1pvtxNudGm1wWqzgrrp0lAoqHkk3aMKUik1n7y4Qb3pSktLUVJSwtelrgB+fn4ICQ1BYEAAz6GpQR1TyivKeV7U8ZcaYapUyiZtX3M+l9uFMkM5dxGmZpgqlYrtZ7fZYbaYIZfJuSUUzbHKaOR7rvkN97dzu+FwUHNN6nBHHdm48x0kUgk34KR3jt4Batjga1Crb5e1FG5ntVfzW0zzV0As1V50i3GPy8Kdg91uGzwuO59PogiBSCJrxQPywGU3wuNxQCrXA9RW6hKGx+OE21YGp6UITlsJ3E4zt6qSyAMgUYZBqgyGSErvro+LeNxwOavgcVrJstxXz2trWtNOuJxGuB1GwO3mv0lk/hDL/SCWNt67kI4hu9O7JpJqIRF7nw81pnC7THC7LJDIdJAqglt0782C0tmzZ7Fp82bk5xfwS8RtfMRibshYXW3iDq308tALRcBEnWE7dozGoEEDuVX1pbT7o+6xGzdtxsnMTEycOBED+vdr9FHSPDZv3oKtv/7KxtBpdby4lSoVv9A0P+owK6HusiIRXE4X/wexCLSYrBYrLwhaMASuN0+bhoEDB9YBpdNZp7H9tx1IS09nEKNjbVYrnE4XN4HsEhODfv36oUvXGL4mLc6tW3/F7sQ9PCfqxaZQquB2uWCqruamk9wbzuOBSEKgrkZERAR6JfRCp04dWtUpheZ99OhR7D9wEPl5ed6FLRbzh8PhtHOr73bt2qJXQjziE+IRHBTs05YEuN988y0yT2ZCqVBCKpcjKjISkyZO4N52TQ16Xt9v2ICkpKP8rgQEBkAqFqOyqopbm8fFxuKmKTch5XgKtvyyld8jvV5/riOwt8svN9qs3SWS/qcIcNjtDOzDhgzF4CGDfH70XI5qVJ75HNbibd5+ciIFpDItVG0mQNNmAkTi1gAJ4LIZYMxZD2vZYRA4wWOHQt8bfh3vg1QV3iJYoVuxGg6hOvsziKR+0Hd+GFJ1WIuOrf8jAl1HVTqshj2wlx+D1VrGQM2A7rJBDCckUiVk2kjI9X2h1MdDqmnDnWpobdJwOy0w5n4PW+kOr53FanhAawKAywiX0wy6jvc5uCGTKiFRt4E8eBjUIUMhkVHz0AuDPhuW4j2oPL0GHkcZN4KAmDrjSCDyWOF2lsLtckAVOhr+0XdBLNM2e+/NglJxcTF3bqUmjelpGTibe5Y9DPrqde3WFX379kVISBD3JCPgSk4+ijOnz6BL1y64887bMXDAAPZSLmb8um0bFr+5BOVlFZhz/72Ydc/MRheqxWLBBx8sx7r167kxI80rLCwcSqXXuysqLMLBQ4dgKDN4vQedH/r26YWoqCj2lsrLypGekYHjJ46zt/f4wgWYPGkSgxIB2oEDB7F27Vrk5Rdg8JDBGNCvH7Q6HSoqypGamo7EPYnIPZuHUaNGYN4jDyM8PJxtcvRoCo6mpODUqSykpKSgsrIKcrmM23j37NkTAQGBgNsFQ1k5TqSlgoCPvC669sSJE+Dn13zro7y8XHz3/Q9ITNwDf38931dMTAy3g7JYrSgoKEBaWhqOphwDeZ59e/fGjTfegF69Eho0qyTw2L79N/y6bTtSU1O5xRSd56YpN2LWrHvg71/3paz9XOkZ7Nu3H8lHjyItLR0nT57kdyUyMhLdunVDv759MHjwYGRn5+D3fb8j63QWUk+kory8goGpQ4cO6JWQwNdzuJx8arFIBOrFR/anbsUzpk/H/XPu8+nxuV1WWIp2w2LYDXvZYZgNSXC5qqFteyNCe73S6vbf1fm/oDT5BdiMJ6Hy7w51yEAoQ4Z5e9PJ/Fv0SjttFShN+QeqTn4IuX8cQvu8AXXY8BYdW/tHTnslTLnfwlbwPVxuJ6S6HpD6xUGiDIdYLIfbZYbbVgxHVRqshgNwWQsZOFWhw6Brfyfkui5eUHLZYC7aCZshEY7qDJhKk+CwVIEwS6kJgzp8DGT+cQzg5I3ZK4/CUpLIXqcm6g7oO82BTBlaZ/72ynSYCrfCYUyFxXAYVuNZBjWZQgdNcC/I/OKgDBoIdehwiCSNRzs1J20WlLwutQNWiwU7du7Cx59+yuAT36MnHnhgLvr06QWpTModXMlbycjMxOpVa7ArMRHx8fF4bMF89IiLa/VDqKoy4t1ly7Bhw4/cC2zE8GF4bMGj/LX3NUpKSrF06VJknjyJGTNmYMSI4dy9lj4H9MLTi71q9Rr8tGkTnA4nhg0bhgcfmMtffwpVnC4HTp8+jS+++BLHjx/HfffOxrRpUxnQUlKO4a2330ZW1hncdeftmD79Txze1QzyiBL37MX773/AX/Dn//ws3zsN+vqTDfPzC7FixQr8svVXhIQE44EH52LsmDHcabcmlMw5exbff/8Dfty4kUOue2fPYjAgr6OxQWD36acrsW//AQwYMAB33D4dMTFd6oQ4NWEk/Wb9+i+RlpqGTp064bbbpmPChHENQjN63gQcn3/xBXbu3AUCm+DgENx91x1sE/KWGxsEQnQ82ezdd5ehrLwcc+fcj9GjRkGtodBUxvZ2uZzIz8/HJ59+iq1bt0Hnp8OsmffgxhsnQ65QsDdJHw+xWMTe3o4dO7By1SrEdu+OJ596EkGBgT6nQF95WqDVZzei9NhrsFSehCogBiEJ/4AuYmqL23S7HdUoPvYKytM/gEiqQnD3xxDQ6X6IFXqvF9bCM5mKElF0+BmYDUcgU7fl8wR2ebhVLaXs5jxUZb4Da8FGyAP6QhM9iz02idy/XnrBA5fDBFv5UVSe+hCms19Dpm6HwIR/Qxsx7by3RK3aqRGp3XgaJccXwZjzA0RyNQK7PITgLg9CwmEWOUpuDg+NZ75EReZb8Lhs8O/2JAJiHoSkdjjHfQldcNnKUZ61GmXpy+Cyl0PXbjyCe7zAff0gpj6F0hbhQLOgVPssWVlZeO2113Hs2DGMGzcWjy9cyC56/UFftUWLFiM7N5cX8dz77282l1HHJfR4sH//AXyxbh17MTk5OZBJZZg/bx57Ir6aMCYdTcaHHyxHn969MXPmTM5p1B8//PAjli17HxarBXfffRcvegoJao+k5KP44IMPGVTmzrkPLrcby5a9h6+//gYjhg/HU089ieDgoAbnJvAh0Pt58xbce+89mDRxUp331uFwYvXqNbywKL/z1JNPYPCgQQ3OU1hYhDeXLMX27dvRu3dvPPP0k+jcubPPh5mXl4f33l+OHTt3YvTIEXj4oQe5ZXhT4/CRI/jww+U4ePAQ2rdvz+A7cdJEyCiMrDd27NiJDz5czp4WAVv79lF44IE5GD50WLNNIykP+PqixTCUGthm0dHtG8Sa7zQAACAASURBVJyfwt61n33GHzE/fz8sfGwBRo4c4XP65MG9884yZJ89iycWLkDXrl2bvM/q/G0oTvorTBXpkMk1COh0B4LjXoCEcjotGJbSgyg4/BwshiNQqNsiJP7P8O8wswVHXvgJ5WbKM95FdcFOOJw2uEwnoQsfhpDe/4ZMHdWic1HeqCz1NVjyvoIyfAoCuj/bopbm1qpMGJJegL1sH/xjX4C+8xyI64WvHrcTpceXoCztDYjlAQjt/Rr8o6Y0fLdtlSg5+iIqsz6GXN8TYX3+A3XIYJ/zNxVsQ0nSc7CbchDQ5WEExT0HsaR1HZdbBUrkSSxe/Ca3tB49ehQWPDqfQ436w1BWhqVLlmLL1l/ZHX/m2afRqQPll1o2KDfx8ScrUW02YeSIYfhy/VdISkrGrbfegrlz50CrqZ9083DoQp4c5YJiY7s3uBAtql9++ZU9Hvry33ffvZhx2/QGXgjlZr786muIIcKM22egqLgIL774ErKyTmPOnPtxx+0zGk1Ep6am4aOPP8WgQf0xbdq0Ogudvvaff7EOK1euRGBQIBYseBSjRvgG2C+/+gbLly+HTCbH008/idGjRja4H7PZglWr1vCi7tAhGn9+7hnExsa2yMC7du3Csvc+QGbmScTH98T8+Y+gb58+DY6lcPftt5dxOE75OPLoevXqhYcfegjdunnDgcYGbTi88867KDOU4dFH5zEA1h+UAP/yyy/x6arV0Gi1eHT+I+w9Ntb5d9v237D9t99wy83T+OPT2KCErSn3exjS34O5uhhwGKAJ6IaQXq9CFdy/WRtRYttw8hNU522G25LLuZGALo9BHzMXonNJ3GZPAsBSuh+VGUugCBkGt1uKirRFEEsVCOn9GrRtb2j2FJTALkt/F1Unl0IZOBDBCYsg92v5OjKe3Yjy1H9BGToGQXF/5mRz7eFxWVGW/gHKUl+HSKpHSK+X4Rc11af9y099jtKUFwG3GYFxzyMghkCuocdsLtyO0uTnYTWeRkCX+Qjq/gTE9a7b3I23CpQoR/DGkiVITk7BqJEjOJwKC2uYtDNWG/HRRx/j22+/53DrySeeQL9+fZuby/m/Ux7mw+UfYdToEbhh0iT+sq//8iv06BGHZ555GjE+PAfKfRmN1WjXrp1PL8kLSlvx1tvveEHp3tmYMeO2BqBEC89gMHAuhO4t6UgyXv73v1FqMGD2zJm4e+ZdTea1UlKOw99fh06dO0MqubDLQrmdtWs/x+o1axDUDCjRwluy9C1Ovj/x+EJMmjSxge3Ik1y0eAkKCvI413PvvbPYm2zJoPv/5JOV+Oqbr+GwOzB12k14YO5c6GuFpHSe3YmJWL7iY87rUFhKHyXyCCdMGI8599/n84NUc30Kv9955x2UlZVj3vxH0NHHR4nyW+vWrcfqNWsZlObPexjjxo5tFJRodzU7Jwdt27RBSEhIo7dKoGLM/gKmkn3wiNUwF/4CuEwI6v4UAro81CywWMuSUXZyJRS6SDjL98BYvB/+neYhKPZxiGlXrwXD7XagMuMtWEt2I6jXq3A7XSjY/xDsVWkI6DofwbHPQixt2oMw5m1ByZFnGRSD+yyCrl1DL6apqTisBpSl/B0ijw2BPf4OqTqiHihZUJb+HspOvAGRTI+QhH/Cr/0tPu1vzKe5/BVOUw78Yx5ESI9nfSatTQW/oDTpL7BVZ3s9pdgnW5x/q5lc60HpzSVIPtoMKBmN+OhjAqUNaNe2DZ566glOPLdkUD7is7VfYP/BA1jw6DxOkP7002a8/c47/KWeN/9hTLnhxlYnz72g9AveevtdBiUK3W6/fUaT+Rqab8rRY3h98WJkZmZi0MDBWLDgEXTs2LHxW+HNI0+DB9saUPrpp01Y+vY78Pfzw5+fexZ9+tT1CsxmE5YvXwHyqCLaReDJJxdyPqk1g8K3t99+F+mZGYiJ6YQFjz6KAf3rehGU7F61ejXGjB7NGwIUfp44cYJ3GqdPn8720zRCMSBQomdGubz58+ddEijRLinZlHcqWzBc9gqUZX4Ij8sMVeAglGW8DXNxInTtJiG0z6uQa6Ib97JcNpRnfgqnORe6yBtQlfUeKs/+DL+ODyGk53OQyBrfGq99UpsxCxUpf4FEHYmg+Jd52774yPOozP4CyqAhaNNvMRT+jYegBCglyX+FKXsdtFHTEdL7Fe+WeisGeYy2kp1wm3MgD5vUYMeQdhRbDEp5WzgcdppzoI95GCFxz0DswxbXLCiVl5fjzSVv4eeft6Bvvz549umnEB3d+ItQ2845OdlY+ta7aNMmHI889BA0Wg0nrxcteoN3r6bceAPmzXuEt5JbMy4WlIjv886777GXRV/z8ePHYfr0W9GxhfdTM8faoEQ5qccffxzDhw5pcAtEFViy9G38snUrpk6dynktSnrXHuSxLl78BnusQ4cNwxOPP4a2bdu0xhygjQHKldEOJ3F/7pk5EzNm1A1nt/66jRPRt95yC6ZNvQkbNvzASfWi4mLeUbvvvtmYNHEibyTUHxcDSo/On4dxY8fUORV5rElHkmAym9G/f78W5Sad1hKUHl8MqVwH/0738cIrz1gGmaoNQnq9CF3Uree5OfXnba86idLUt6ANHwVV8CAUHXkGxrzN0HeYjZCEv0GqaJhDrX8Oon8Yz3wOU/ZKaDvNhy5yGuBxovzUJyhNeRlikQJBCS/BP/pP55LmDR+dsXAnSg49AdhLEdDzb9B3vPfiuFYeJye1IZY3uFZrQKni9DqUJP8d8JgR1OOvCOh0n0+KxdUFpVEjveGbj5zSsWPH8cor/8aZ7GzMnn0PZs+6h0mBzQ3yhH788Uf2sO666w5OptOgJCeFEd988w06deyIZ55+Cj169mjudHX+frGgRMdRLmP58o/4fogg2at3Lwan3gkJ7DX4WpT1J1cDSmtWr0FwaDAWLliAwYO9iW4mb3o8HH5u27YNP/60iT2L2bNmNgBz+t2OHbvw1jvvoqSoCDdNncK7iK0FacqdrVqzBuvXfwWX04mbpkzhfJ1ef2FXkQDro48+YY4YzaXaWI2PP/kUG374gQmt8T174sEH5/r0glsFSqvXQOfnh4ULH8PIEXW3y+nZr/j4E96Be/iBuT43Vurb2mHOQ/nx1yBVt0VAt4WoLtiO4sPPwGEugr7zbAT3/AukCh+7dx43qnK+RnXRNgTHPg2xLBD5BxbCnPcj/KNncHgjrbcd7usldFiKUJ7yf/A4q6GPfxkKrfeDbDEcQvGhZ2ArT4au430Iiad5NAQ52h0rz1wOw/FXIZaHILTPa9C1Hd+q970lP24ISi/Br/3NDbx84i6VpvwLVZnLIA/ojZA+i6AO8h35XEVQOsqx/xNPPN4gD5Gbm4dPPvmUv/QUDjzyyMPo1KmJcKeW9UpLDVj61juwmM144onHOD9Us2h/3vIL774QNeGBuXNw659uhUzWMneeznGxoETH0gL+fsMP+Obb75Cbm8sPLTwsHD16xKJPr96IjYtFZGQEs5MbGzWg9PnnX0CjUWHUqJHo3KnzeToAJffTMzJx/PgJ9OzZgxd7tK/ksN2O777bgBUffwy7zYbb75iBWTNnMrenNYPoG99+9x1WrlzNzO8RI0Zyojk8/EKOkEHp408wYdx4/kgQFSAn5yw+XL4CO3fuZPIdUSseemhug0R2S0Hpi3Xr8dlnn7O39qdbb0YfSriLRF6GvViMzJOn8MOPP6J7t+546KEHoNM2T75zVJ9GVfp/INXGwC/mUTgtxSg69BR7PMrABIT1ec3n7pHLWoTy9KWQyAOh7/ooXHYzCg//Gebcb+AfdROC4v8FqbppAik9A1PBFlSm/hvK8Buh77rgfB7KaStDSfI/YMxaDUVQH4T2WQxVUK8Gj81pL0dJyr9RfXolpP49ENbndaiDGm5EtOZ5+/rtBVBaDJE8AGG9X4cucnKdnxLFoDr3B5SfeBkElgHdn4Nfh5kQS3zTQq4OKC1ZipSjKcx2nnn3XZxwdLqc/OUk9ndi4l7m+dBCveuOO9C9e7cW22737kSsXLUa48aNwW3Tp9fJGxEYUGL34IEDGDVyJBY+vqDJZGf9i14KKPGLZjKBdq0opCFiICVwa1ja7aOj0btXLwwfPhRdunTx6TkRDWHt2i84sUtMcyI3hgQHMyhRuQnlXojLRODUsUM0xo0fx55U+6ioOnagXbc1n32Gz9Z+zjmWe+65G7fPuK1FZSC1bUJcoS1btmDFio9QXFKM/gMGYuGCR3nbv2acB6Xx43HXnV5QokG0AiKqUvhIpTFTb5rC3jCVkNSMloIS2WPd+i/5o0FecHCI1yYEeEQHOXXqFCgdQJwquleFvPlEs63iOCrSFkMeNIDJfoAYZWlvw3BiMeemgro/jsBuF8CiZs60c1R15jP4dZjFBEciPpYk/xPVOauhDR+DoN7/gVzTcBextl3dDjPKTrzMpMPAHi9BGVgXdCqzv4Qh+f+49CKQwqDO9zUIq8jTKzryN5jzN0AVMgShvf8DhX8L1xGxsb3FOXU8HrYp5zovEJkvgNISQKpFQPeF8Gs7nhlYLpcZLlsJ7yBaCzbRv0Db4V74Rd3hM5dUY4OrAkpL33oLx4+n8s4UMXCpDolYyvTi0K4VhTJTp97EjOHQJnZI6oMGeSPLV3zEzGPKLdD2NpV90KA6NqvZyouRvqwUMj71xEIMGDiwxYB3qaDk9djc7CkcPnwEhw4dQUZmBgqLiriOTavVMgBPm3YTRgwf0aA+63z4tnYt9P56XmD9+/Vjer/Nboep2oTikhIG/F2Je5gpntCzJy9GAqcaVjyB46crV+HLL79ijtXMmRcHSmQPYm6/98GHKCwsxICBA7Dw0ZaBEtvy11/xycef8o4cPY+ZM+9iGkQN0bOloMSe0udfMMt94oSJ6BHnpTUwodTtwrFjJ5CYmIghgwfhoQcfaJFHaC75nUFIFzEF/tG3g+jKlpJ9KE76M5MY1eGj2VtS+l2gNVC9XHnGe3DZqxDYbSHXj1G9muH4a6jMWgFl8ACE9FoEpX/TVAg6f9nR56HQ90Rg7AsQy/y45o0G0QlsFWkoOvwsl4ro2t+GkISXGjCkHdXZKDnyPKoLNjMju6WgRIlt2jm0liVxDkmqohITDZeWOCwFkCmCoAkfxrWAbGNKdGcsQ1nae3C6PFAF9oBS2wZwmuGwlsJpLYbLUQFVYH/eMVSFDG40B3ZVQYmIffSidO3aBSNGDOOaKlqoBw4e5B2qiMhIPPbofOYxtWZkZGQw2Y7AbfToMQjQ+5+rq6OCTCrG9HDZw+/79vNWO5Ey77zzzhZ7CJcDlGruh5Kv5NnQ/R46fAT79h3A2bM5TCPo2LET7r93FkaOGlnHYzqf6F69hhndTz39BAYPbEierKqsws9btuKzzz9DXl4+evdOwMOPPITeCd4vLoHSmjUEzus4zCEviQDOy15v+aihSHywfDmKikswZuRI5hPVpng05inRVaw2G+f4KBylpHlMTGfmcY0cPgIisQgtBSXylFauXsM7jY8umI8xI0d52cRUDygSobi4hENV+vg/8vBDCKjljTV2t9UFv6Dy1Efw7zAL2nZePpCbQiJiaJ/8FGJ5EELi/wZ9hzvOLzJreTLKM96Hpu0k6CJuYo+CqAVELCzPfA9yXRxCelMY1TDcqpkHkRHLMpejPHUR5Pp4qENGnmNGEygRO10OKhepyvsFDuMJqAPjENrrX1x+UXvYq8+iJOkFVOdthCKgF0J6vwpNSPO7qx63DVU5G1CRtZpDVolUxkBIXhmV4Gja3IDg2McZcM+DUvoylKW/Aw/kfN/qgFi4HWWwlB4AJdupLMW/4z0ITfhHi5L8V8VTeoMoAckpGDd2NB59dD6CgoJgNpmxb/9+fPzxp8g+m4Phw4dh3sMP8Q5NSwZxX77++mt89vk6rswPDg6G2+WmMl/v4SJvIS0lZGmhUhU87cQsfOwxREY2H+PzS3mRlIDm5l9dbcSRI8n45rvveZeIuDf0VadNgKhaoVB9SsBjjy1g8qSvQZSFr778CqvXfMZKBNOn34I5c+bwwiXC4dfffItPVq5kHhOVZVD+KUDf/K5Q7WsR9YJ20yhnRETHaVOn4oG599cpn2kKlOhc9AFZuWoNiClvsZiZi0bESiKvUoKaiKoU5raUEkBk3LFjRtcxCb0b+w4c4CT70CGDW+QpVZ/9DsazX8C/8zyoQ8/ZmJPY36Lk6D/gMBfAL/o2hMT/HTJVOIhEWHFqFSzlJxAc9/h5xjRt4xvS30Z5+luQqtpzbkcTNrTRV8JhIjB5HhbDQUg0nSCRqQDa+TpfkiKCRySBw1YNuzETMokYgV3nQd/lEYhr1YQ5raUoSXkJlac/h1zVFkG9XoRfJJXI+Cr7rzUd8i6tRbBXn2FvqSp7PSxlRyCRauHX/jb4x8yB0r/beSD2hm/LUHbiTc4pMXkygkDcBXt1NkpPvM0FyXJVOAJ7PMdep7fEpvFx9UDp6FGMHT0ajy98jGU7aFAVN4EKlVHQmH3vLNwxo3keEP2WyiUWvfEmLGYL7r7rTrRpEwabze6tgD43KKlNLyhxZ4iUSdvktPBHjx7ZKNmutun+KFCqucbe3/czd4i8ubDwUMx/5BHePaxhJ7eGp0TnpALoN998E4cOH0ZCQgKXapAKAXkQRK6k7fyCgkIuVXls4QKu5G/NoA0DCpvWrF0LsUTKOaH6DPfmQImuR2TGDz5YgR07d0AilnAtHYEQ8ZcWv/EmSkpLORy/ePKkBw7iKbnddaRnGrtXqsGqzFoDY/7PCO7+FFTBF3aJbFTrRR5I7mYo9N0Q3Ptl6MLHwG7KRsmxN6AMSEBg53vOb3WTd1GesRxlqYsAWSCHfH7tJvi+tAeoPPMFqjLegCJ0DLRRt0EsIvkcSkFcABORVAm7uZDDS1tJIrRtJzDDW669kMsjsChPfx+laUu4WDug+zwEdX28WbJlnffdUY2SY6+hLON9LkQO6/s6dG28u9k1o06iWxaI0N6vwC/qpvN/NxsOcRhpKdkDbZuxCO71MpT6pne9ryIoecmTCxbM512ompGbl4u33noHv+3YyaRHAq0+vRt3d+k4pgFs/AmfrlqFGyZO5PKPplQFDh06xGFebl4+V4zPnduyurqLASU6hoh7pOfTnNKBxWLFio8+xjfffsv5pFn33IPpf7r1fHK4taBEYdyy99/Hjz9tRGTbdsxrGjjQ68ITT4l4YIcOHkb76CgOu4YPG9YaTGIvh0pNNm78CVFRkcx18p7/wgJqCSjRRSmEXb5iObPf/f38Mfve2Zg8aTxWrlrLmx9UxnLxoNTwtvi5uFyc6K9fkkJejyH9fVjLkxDS4/k6BEW32875E0p4A3ZOeAd1fxpVBb+iKvs7BHefB1VAzwuLlljZWWt5O9wFKcL6vAp9+2k+i3GdFgNKk5+Dw5iO4N6LoQpuPNwitndJymuoyHgLMjVxp16Frl3dXa/q/F9RfOQF2KrSoGs7mn/T4mT3OTWA0hNvoDxtKaTqSCaNNg5KNYzuF+HX/tYLmmNuBypOfco7gfCYENj1Mc631eSkfL1wVx2UfJWZ/LZjB3NoCvILOCR4qBluiZdouRRZp8/g6SeeQK/eCU0uLiIzUgkGcYfie/ZgzlJjBauX6ilREvvQwUNcUU8yLU05z6RftHHTT1wUbLM7mPR46y03n2chtxaUSHmAOEJUXlOfFU9/o13KL75Yz2Ep1YJRoWxraAEkp7J48RJkpGdg8g2TmA5Aki+1R0tBieZAOlZUWnQ66wy6x3Vn2ZWM9EwufqZC4Q4+yKatLTOhuVHejnSjKCwkFnt9aReXsxqV6UvhtOQjIPYFrpKvPczF+1B05M+wlh+Cf8SNCOj6JKoKdrKYXVDXOXXqtMjrMmZ/jVIK+Rw25ilRYa+vEKY6fyvKj70ARcBABPV6uYHuUP2Xuip3E4qTXoDTnIfgbvMRFPsMRLXKTjiEO/pP9vokCn8Exj6FwJgHmy2RqbkO5cOIQFqevswLSuQV1vPyWkKetJsLUJr8IqqyP2OApxBP26YRb5HpEFe4zCTrVBYop0SV9BQ2+SrIpV00qqsi2Qsi9M2f9wjXbjVWZLn3932ceyBJiscWLGhSr4cMTjtyX331NRe+kjIi8aBop685T4Z2zqggd+lb3oLc+++7l3e2mpIFoUQ2sblJeoXIgySp0WjY4PZg888/4+13l3Eh7tNPPYVhw4bUCd8++2wdVq1exSoDlFMaMWxYo3apNlVzGcgPG37kMpNnnnmqDheIyj2oFOXwocO8lf7II49g5MiW6fTY7Q58unIlVq1azYltUnsgOkP9sX3bb+z9TZg4HnfecXuTkiUElJQHo6Jjs8WCoKBgBpDusd3wyMMPIyqybt0VXYtAiaRUVq2m2jdNs7VvdAzVvxGRlUQGH3pwLuc063x87JUwnnwTHrcF2s7PnE/q1vzGRdv8Ka+g4vQaJkIqAvpALPVDYMwsqOpxgWhr3ZS7kcs97NYKBPf8KwI7z27AZKZEsuHYy7Dk/wB9979wvqo5aRO78YyXA1WwCZqwkQjt83qDspPqwt9QevTvnHRWBPVHaMI/oQ1vWJzt653kouITb6Is7V1IVW0R0ucV+LWrW0PpBaX3L9S+9XoJflEkcVL380tUiaIjf4Gt6hj8om5HSK9/QKbyncs1F/6K0qQXYDWeQUDXeecKchvX4PI191bVvp05k43XX1/EQm5jxo5mqYn6LwVdhLglJM52YN8BDBkyBE8++Xgd/kvNRIjA9977HyBx9x7WFxp/jsHdXBxCPKg331zKfKEbbpjM4Uv9Ugxf56BSEfLK6Os95/6aiv/GCZgk2fGfRYt5y/+pJx9nj6mxQeEELeC1n33OeZ4nn3gcYWEXFBQICOhvBNgkikf1gEMG+5Z/oGuQ5tGr/3mdd/juuftuzJp9T50SC1rwBILkTVGIRPQI2p3q2aN57apduxKxZOlSDuFIOI/0p0hts/74bfsOJkpOmjyRpV5IKbKpQeejMpSfNm1mwilRFgYNHswfpkgfqpV0D0QJWLlyFQvmkfYW6S41NX7ftw8rVnyMgQP7c2lMfYlkF+1upf2Lk8y6GPI+6onkEXP+7PcoPvovXjgkRBYQMxdBsU/VSTbXzMFS/BuKaQvfVMiV9kFdH4BIVLfwmfSLDElP8q5eYK9FkGuaz+/RrlZ5BlXoLwblmULiqexkRp1bJ/ndqux1XMVvrTwFTbtJrE/UGJu69sEsS3JiEQwnFkEi1SG410vQd7izjpdH+S5vOPs6RDJ/hPZ+lUmi9YdXTWCZN7cmliOox/8hgMDZR9LbXLQDpUnPngOlR8/Z9Q+ULjmSlIQ33lhyrjh1AOeMon1Uf5M7v2nzz3j33fdQWVmBu+++E7NnzaoTXlAuiSrdl7z1Nvx1Ovz1r39pVm71/ItisWDp0rex4YcfOSxYuHABBgxoWpKCdq3Wf/UVewf0Vb/llps5H0WyuY0NUjt4d9n72LLlF0wYN4633mtY5vWPOZKUzIBH5ybdpxHDh9b54lAJyYqPPsK3337HypZUZT916pQGRaYkfnb2bB5Wr12LLT//wtIiFCYTBaP+oB0vYjtTGEc5tv79+zOhlSRvfbHLSUudEucfffQpcnPPYurUaUytCAhouHNHIEuyuKtXr8Wo0SPx4AMPQKttnnZA4nDLV6zArl27OV84ZOhQPDrvEZ/PlugNtPv31dffcOhIKgHjx43z+TjIa/Ge+yOkp6XzLh+RbBvYpOIEyo8+D6UuCvq4f7JOUP3hqM5BIfGAcjdAqY9FaN/XoanZpav3Y2tJIooOPQlrFX355yOYClGlFwDc5ajivE316U+g7Xg/y3pQgrslw1y8B4WHnwIpN/q1v5PLTkgIrvbwKh58zrV7DuMpKEOGQk+7imHDWeTN16CowF6VidLjL8OUtwFyXTcExD4LPxJ6E1+YG3GySlNeRVnmCgZv0owKipnDvK76w159GiVH/gZj3rdQBQ1kTSh1cF2eID3vyux1XN/nshRCH30HguP/DxJl44oOvubfrKdEoQ7t8uTl52HHbzuxY9cuLksg5T/Svhk0aBDatWuDNm3a1BFMoy3hNZ99jvXr17Pbf/ddd2HihAksQk/KlSdST3A4lZyUjMj2UZh2003o0TMOEe3ascB9fdVz2ogjyVqSKMnPz8MPP/6E/fv3845P3359maJAuaXIiEioNV5kpoVFvyeuC2kHbfnlF/auSJObqt4nT56EuO7dmTdUf/50vM1uYz7QJx+v5N2fYUOHMd2hc+dOHG7UaGCfzMzAjz9tRpnBwCEh3SeRAQmcib5A9qN6QFK9zM7O5lCTmN/k5XXr1pXDPeL9VFVWMuXhwMFDIG2mzp074q4770L//n0bDfPo+RAAfPf993xMeJtwVunsd04OmOZB7G3iVR0+fAiU87Pbnbhh8mTcOOWGBmVCxC/KPpvN0sekL05eadt27TgEJ7CLjIxCUGBAkzueSUlJePe993HkcBKGDR2Kp556/Dw9xGuTMhQU5OPYiePY9NNm9qxVag3XvdGOJXGuzhNnxWLWGy8oLOD73LN3L2I6x+D5555F11qaTqR6aK08BmP2epaNlSrDoI2eBU34WMj9u9TR/nG7nTCkLUFV+hvQtpuG4F6vsOj+heFmIXyb8RSMuT/AmL0OlONRBfWHf8f7oQpKAERSOMz5sBTvQPXZdbBbiqAKnwT/qFuhCoiFVNPRp+flcTngMJ8FlbQQobPi9EpYq05BrmoDXfuboQkfw9K17G2dU2qkXUAqXTGe/pSlbkkZUhU+Fsrg4VDoOkFEutceAhIH3PZKWCuOw1q0lWVS5H7doYm6zauvTQJ3pPNtKYDDlMvUBSocNleksSqkNnQgdFG3QRkQC5k2GhJ53dC4unA7yo/9E7ayg1C1mYSAbk9AqU9gcigRId1MugAAD4hJREFUPq2VaajK+RKm4t2AywGlXzR0UTOYdCnXRnvzey0A7GZBiRYRsYePHT/BLwppc1OZhN3hBIUkapUK/fr3w4zb/tQglKNaNireJE+DBiUmyY0nQDqVdZoF90kOlgbxZkJDQ1hulV7k+kWuBDB79v6OnzZugsFQAjdVIlC3BJbrdXISmjSMiIbQrbtXEoL0pTdu3Mga4xWVVczzkMlIUF7Ex7jdLvbe+vXpg1tuuaWBoiSd+/iJE9i2bTvO5pxFRWUlY2VIcAi0Oi2DCxWKVlRUIjBQz/WAVO9H8sA0yGsiIKTFXVJi4N8TKFPYQk0XNFo153TIBgRKNouVSwS0Wh3iYrth6LChiI7u0Bw7hW1AqqC0aA8fSWIAonweMeopZ0Z/p/IVu92GiIhIlgomD8yXrO2RI0lY9+WXrBVOu1ukcU7Pmf4LCw/jwl0SnWtKRoSuRwoRFMqRuBsV2tbIGBPVg96HLVt/4fwQdZohMqzb4+FdTioIlssUrPhJgyJGl9PNvCe6LwJhysXNJf2ngHOegscDU9F2ZmRT3ZtIouFONiKRkxnRAV0XNgipTEW/ofrUMmjaTYO2/Z1cilIzKLSqzv0eVWfWwWbKY0ATianBg4s1prnURKqD05TFWthU0uERKeD22CERA9rQwfCPmQ+Zj5IUp82AylOfMJi57N7nzVI3cLDcrESuZd0kv073QSK7ULZDXojdeBLmwq2wluwEcaJIME6pawO32B8ejxRikYvlcN1OK+fSlMFDmKdVu16Pimurs9fDmPst7OYSb9mJRAkRdx6xcSmKWt8B/h3vhSp0bB2viRL/JtqpPLUcjsoU5jwp2t0KsSIUptwNoPIeViRgzSkJcK4DjEwVxFLEuo4zmTPV3GgWlKh0hJQmaYua2LSUu6GyD5fDxa14qoxVCAkJRe9eCVxqUX/QS3T8RBrS09OYlUuSJPTlJmKkP3X3kCuY40SC/gRM3bp2Zb2i+qBEnkrWmTNIPZ7KKoiBwcFQKhTn2hVZUVpigFQmYzH8mqJSylmRVjTJoZBKASk+eheiiNsokSoihRAEDHScr90rAkPKj3DrIoMBZ3NzUVFezsRFelHoGOpAQozm+sJjBD6paWnIOnWKBdgCAgOhUqtYI5wWGZ2TFqNXfwlQqzRcD0eeG+XqmtLC9vVg6X6Li4px6vRpFtk3mywM3CQNTCEaSdLSXH09p5rzUY0hNRhwOhwICg7m2jYKfUtLSlnMn7hS1PSgOWUEeu4HDx7k0/bp05fPQ4NsciI1FVmnT7NHFBig97bDokVnd3Dy28vmvnCHLELP2/9i7gDTJjyc83vnW1HRsVWZsJQdgkii5kUCtx1uawFEcs05L6HuziLlnhzGDObwkPh+7UH5GGJ42yuPAWIVJIpwbjdEyXOXrZRagvAuGHkIBIBiGXn2ErgdVXDbCiFV6KEKGQ6JDyUCImSaS3+Hw5QNiSyA81AMeKD2UOVw2w2Q69pziFR7N65mfjQ3ksi1VWXCZTkNOCvgchJBUwqJXA2xPBAyTUfINFHcCqp+xEGdRWzlh2CvTIObur0oQ738Jw/pexvhshVDIhZBGdQHctLWrgXWNAcvOGbBatgLtzUPEk1nSDWd4TSdgsdhgkgRck7hkjhaVj6fx2WCXBvDqp/c+qqZ0Swo1chqUEbe1w4agQV3xGnk7zXXJ8+EgIBeZhKPJ0H4+oO+sE2dhxYwuUjUn83X8HU8/Zv3i9v4MU39vbHFX1t4rCnw4Dl7PD6vX2PbmpKK5nYQm3uYtf/uFfB3MiiRzWmOje2A1lmQ52RUfM2lOVs29kzqn+tiztPsvZ8H93rP2eM+tzCbYUPXvwCJ4fN73fC9IY+Bz8Z/q3denoebikoa1TGnZ8KH+zx3zd/ovE3Pmc7D5EwPNVmgnxOfTu4zJ1QPdc99CH3nvui8F+7Pt+W5wNdNveO8NX3cqY+/JD7mfO5+feWqfJ29WVBq9mUQfiBYQLCAYIHLaAEBlC6jMYVTCRYQLHDpFhBA6dJtKJxBsIBggctoAQGULqMxhVMJFhAscOkWEEDp0m0onEGwgGCBy2gBAZQuozGFUwkWECxw6RYQQOnSbSicQbCAYIHLaAEBlC6jMYVTCRYQLHDpFhBA6dJtKJxBsIBggctoAQGULqMxW38q5gw3eRiVuVDdGtXxEWGWpDr8/f191p55SzXsXOtWXyWA/p3Ke0gVszHmONXwFRYVcj85KnMJDQ2tU2Tta6I1RcfFJaWAx43AwCCuIWxpiUwNm70pI1ANIdmA6uao5o7UCkjLvblRU3ZDNXNKlZLLich2TQ2DoQxFRYXQBwRw7WBLW4U3Nxfh7y23gABKLbfVZf0lVeOnpadxX7faHUTqX4Rq0agVEhXsUg0bMfapWQKJ9JMESv1BXXxJ3zshvuf5Wjxa1NQWioqB4+LiGgAGAQN1kzl46DDX45FmN5XGUP+5fv36Q6fzLVlCIEGKACQ4xyU+Ymoi6eH6OlJuCK4nwFZ7rlT5f/p0FsorKhAXG9toI0+qhySJm+MnjnOdJJVmEDBTI9CuXbs2WoNHtYW//76PNcRJVZJKQ9QqNfr168d1ir4GqTlQt5y8vFyuaRw6dDArErSkPOeyvhzX+ckEULpKLwApRn6+bj3GjBmNSRMnNPrik4YVNelMiI9n0TjqQExddCOjIjFh/LgGRcR5+fnYtGkzunXrgiGDh7BXlH0mm9UKSMGyd+/eDTwlAqStW7chJDSENdVVajXOnDmDo8kp6NAhGiNHjmggpka1dfv27cehQ4dZQoSUQ6mwlvTDTxEoJsT7vFaNualgl1QqSc2UWjPRdXwNApcNP2yE3Wbl+ZNcDAngFRQWYuSIEXydBkqJZjN+++03lonp3acPKxWYqqu5iSbJ6I4bNw6d63VtJq+KJJaLqAfegAEMljqdlgvESaxOGFfOAgIoXTlbn78SLchftmxFanoq2rZtx9pGQUENe9uTB0OgRFpQ48aO4ZCKwjnS105M3IOhQ4awukHtRUmLa8eOHSgqLuamoNTmetuv21BYWIzJN0xGYGBd0TNa9CQzQoXDpPxZI/hWc+2DBw9xU4L6nY7zcvOwafNmbkhKEiuk2FAzSOKF5EiaUiMg0Nv88xYOS/v368sNN30tfmp0+vOWLQgJDuImnyRvQmHmtu3bue3SlCk3NNAWJw2oPXv2cBfn+Pj48/OiMI4kU2RSOSZNGA9NLVULAtnEvXuRkZbBoNWhQ3tWrfDVnOAqvDLX1SUFULoKjzslJYXlYCiUolArLCQUw4YN5QVXexAwJCcnIz0jk5t71nQcpnBs40+b2KMZM3pUHUCg48lD+GXrrxgxfDjnhX74YQM6deqMIUOo+WXdHNbZ3LMgLW5SrawPPJVVVdztJDwsjOdXkyeieVE4SFpTJJRHcis0aF6GUgPcHjd7cJT38QU01Hp869atDFxh4eHclmrYsGEsrVJ/UC7pl61bWR+KxOtkMq/+FoVl27dtw+DBQ+qoctodduzauRuGsjLceMPkBp5k8tGjIM2oiRPGs7Bf7UH3u3vXblDI7AW0ns1qv1+F1+d//pICKF3hR0wL98uvv0Lu2TxWhyS9JdIuunf2rPM99GqmVANKaekZDErUHpsGfcHJyyB8GTd6DGs01R6UF9qxYydrF1FiNzcvj4XZ6i9COiYnJwekxT1o8CDWSao9SMJ3408/cW5o+PDh51uR07wobKNcEjVtqNFpLywswp49e1FUVMBNFsaOGesTaKjVN8nsRkZGIDQ8DPt+38ftnSZPnMghYO1RA0p0HzyHc6KAhQWF7EH1698fcbHdzx9CnuL2HTtgrDLihsmT6uia049IrPDgoUMsu0tdYuoPst3OnTtxKiuLr0dNIy6npMwVft3+Ky8ngNIVfmzp6em8mIKDQ3hRkDrn6TOnucHCwAED6iRuafFTIjkj8xTGjxtzPkwhT4hCrti4OG5SIPGhL0UJ72+/+57F+ShvNWjgQFBDz/qjorwCmzZtglqjwdhxY6HVXEhqE+jsTkzE4EGD0aNHXJ0wkcDsp00/o3u3buyBkUdEyW5qgUWJ6cyTJ3HTlBsRE1MX6AiUf/11OzIy0lkSmK5LqpkEtFNvmoK2betqVFP4Rvkw6ppMcrkEEAQ8e/fuxcmTWeypta0FLjU2ozbyo0aOqgO0BLLkddG1Jk+aVKc9E4nHmapNrHzpdrk4NK2oqGLQbUmr8Cv8Gv1PX04ApSv4eCsrKzkJTXK5Y0aP5q84LZADBw5w3zv6stddlN4wiXaEyKtqF9GONccPHz7MYQwtLFKp9DUob7Vm7WfIOZuLB+fOYa/E16BFTOEkSQZ3iO6A3r17sYQuJdT37dvH4R/rZtcCqxpvLXHPXg4ve/bsgbjYOPakSJ2TOo5QU0ryzurnlUgjnRLKgwcOZH1yEuyjUIskcik8HTt2TJ22V7RLSc0RSExw0KCB3L6dOrwQuFPn4CFDBjfYtifvisJDQ3k5Bg8kDfm2LKN76NARViEdPXo0txavH7olJu7lri4xnTvhCKutVmLy5MkI0F+Qpb2Cr8t1eykBlK7go6ctZ0ocx8V1Z8nfmkELee/e39G1S5cGIRR5PNQaisCD9NBNZhNzgciz8hV+1JyTvvYZJ08yvye+Z88Gu2e1b9vpcjEwJR9JZvVT8nosZhu3T6dF76vbCR1PNIX9+/bhRGoaFAollAo5UwpCQkMxdMjgBprtpMlOjSTJm6IcVQ3Qeb2bZAZcAp7aXCLyinbu2o20tFT4+Xm9GAJyogMMGNCPZY59DWrYsDtxD19Lq1Ezx4l03fv0SUB8z/gGIRmFupRroo+A0+VkL4o8184xMRDX64N2BV+Z6/JSAihdwcdOTQZIg5rIf7U1rmlRUiMBkggm76n2bhotlpKSUlC7J9JnVSgV3EmmqZ2tmluqkdttSU6EfkugQJQC0uSmcIk8DF+tmuoAmsOBgqIiFBUWMVhQq6SIdm3r7GzV/J6aAZhNJu4fR0n62vdJxxKg0f3XT45T9xwCbuouQ91raEeRrtPcVj3pr1N3mLIyA3tf1B6LdNQb4x3RHCjJTd1vSEue+FYtsd0VfIWui0sJoHRdPObW3STlhi5mMRLoNNewsnUzuTy/vtj7uTxXF87SWgsIoNRaiwm/FywgWOAPtYAASn+oeYWTCxYQLNBaCwig1FqLCb8XLCBY4A+1gABKf6h5hZMLFhAs0FoLCKDUWosJvxcsIFjgD7WAAEp/qHmFkwsWECzQWgsIoNRaiwm/FywgWOAPtYAASn+oeYWTCxYQLNBaC/w/PVRdCWoameMAAAAASUVORK5CYII=">
    </p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    
    <div class="ui-draggable"><div contenteditable="true">
    <p style="text-align: center;"><b style="text-align: right; color: inherit;">INSTRUMENTO&nbsp;PARTICULAR DE CONTRATO DE PRESTAÇÃO&nbsp;</b><b style="text-align: right; color: inherit;">DE SERVIÇOS DE ASSESSORIA JURÍDICA</b></p><b style="text-align: right;"><u></u></b><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><div class="edit" style="text-align: justify;" contenteditable="true"><div align="center"><hr size="2" width="100%" noshade="" align="center"></div><p><b>CONTRATANTE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></p><p><b><br></b></p><p></p><ul><li><b>&nbsp;&nbsp;</b><b style="color: inherit;"><u><span class="nome token_d4s">{{$client_name}}</span></u></b><span style="color: inherit;">,&nbsp;</span><span class="nacionalidade token_d4s" style="color: inherit;">{{$client_nationality}}</span><span style="color: inherit;">&nbsp;,&nbsp;</span><span class="estadocivil token_d4s" style="color: inherit;">{{$marital_status}}</span><span style="color: inherit;">&nbsp;, portador (a) da Cédula de Identidade RG sob o n°.&nbsp;</span><span class="RG token_d4s" style="color: inherit;">{{$rg}}</span><span style="color: inherit;">&nbsp;&nbsp; inscrito (a) no CPF/MF sob o nº.&nbsp;</span><span class="CPF token_d4s" style="color: inherit;">{{$cpf}}</span><span style="color: inherit;">&nbsp;&nbsp;&nbsp;, residente e domiciliado(a) na&nbsp;</span><span class="end token_d4s" style="color: inherit;">{{$address}}</span><span style="color: inherit;">&nbsp; ,&nbsp;</span><span class="comp token_d4s" style="color: inherit;">{{$complement}}</span><span style="color: inherit;">&nbsp;,&nbsp;</span><span class="cid_est token_d4s" style="color: inherit;">{{$city_state}}</span><span style="color: inherit;">&nbsp;,&nbsp;</span><span class="CEP token_d4s" style="color: inherit;">{{$zip_code}}</span><span style="color: inherit;">&nbsp;.</span></li></ul><p></p><p><b><br></b></p><p><b>CONTRATADO:</b></p><p><b><br></b></p><ul style="text-align: justify;"><li><b>RATSBONE &amp; MAGRI ADVOGADOS ASSOCIADOS</b>,&nbsp;sociedade de advogados inscrita na Ordem dos Advogados do Brasil – OAB sob n.º 30.151, e no CNPJ sob n.º 37.837.462/0001-78 com sede na Avenida Moaci, 5º andar, conjuntos n.º 506-507, Planalto Paulista, São Paulo/SP, neste ato representada, nos termos dos seus atos constitutivos, por seu sócio administrador&nbsp;RAFAEL LUIZ BARBOSA MAGRI,&nbsp;brasileiro, casado, advogado inscrito na OAB/SP sob o nº 301.473, com escritório profissional situado na Avenida Moaci, 525, cj 507 São Paulo, SP CEP 04083004.</li></ul></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><div class="edit" style="text-align: justify;" contenteditable="true"><p><b>_________________________________________________________________________________________________________________________________________________________________________________________&nbsp;&nbsp;</b></p><p style="text-align: justify;"><span style="color: inherit;">As Partes, resolvem, de comum acordo e na melhor forma de direito, por livre e espontânea vontade, celebrar o presente instrumento de acordo com as cláusulas e condições previstas nos itens seguintes, a saber:</span></p></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p>_________________________________________________________________________________________________________________________________________________________________________________________</p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    
    <div class="ui-draggable"><div style="text-align: justify;" contenteditable="true">
    <p style="text-align: justify;"></p><div class="edit" contenteditable="true"><p><b><u>DO OBJETO DO CONTRATO</u></b></p><p><b><u><br></u></b></p><p></p><div class="edit" style="" contenteditable="true"><p style=""><b style="text-decoration-line: underline; font-weight: bold;">Cláusula 1ª</b> –&nbsp;O presente Instrumento tem por objeto contratar os serviços profissionais do&nbsp;CONTRATADO&nbsp;que se obriga, face ao mandato que lhe é outorgado, parte integrante deste contrato, para:</p>  <p style="">&nbsp;</p>  <p style=""><b>Elaboração e distribuição da ação divórcio consensual judicial.</b></p>  <p style="">&nbsp;</p>  <p style="">Para tanto, o&nbsp;<b>CONTRATADO</b>&nbsp;prestará serviços referentes à elaboração de petições, acompanhamento em audiências&nbsp;até o trânsito em julgado&nbsp;da referida ação movida pelo&nbsp;<b>CONTRATANTE</b>, além de, caso seja necessário, elaboração e interposição de recursos cabíveis em todas as instâncias administrativas e/ou judiciais.</p></div><p></p></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    
    
    
    
    
    <div class="ui-draggable"><div contenteditable="true">
    <p style="text-align: justify;"></p><div class="edit" contenteditable="true"><p><b><u>DOS HONORÁRIOS</u></b></p>  <p>&nbsp;</p>  <p><b>Cláusula 2ª -&nbsp;</b>Pelos serviços ora contratados, o&nbsp;<b>CONTRATANTE</b>&nbsp;pagará ao&nbsp;<b>CONTRATADO</b>&nbsp;o valor de&nbsp;<b>R$ <span class="total token_d4s">{{$amount}}</span>&nbsp;</b>&nbsp;(<span class="escrito token_d4s">{{$by_extenso}}</span>&nbsp;), via depósito bancário, pagamento a ser realizado na data de <span class="data token_d4s">{{$payment_date}}</span>&nbsp;, após a assinatura desde instrumento, na conta especificada abaixo:</p><p></p><p>Itaú</p><p>Agência 9323</p><p>Conta Corrente 14530-1</p><p>345.890.768-88</p><p>Rafael Luiz Barbosa Magri<br></p><br> <b>Parágrafo Único:&nbsp;</b>Sempre que houver falta de pagamento dos honorários dentro dos prazos pactuados, sejam integrais ou parcelados, fica acordada a aplicação de multa contratual de&nbsp;10% (dez por cento), juros de mora de 5% (cinco por cento) ao mês e atualização monetária pelo índice INPC.<span style="color: inherit;">&nbsp;</span><br><p></p>  <p><b>Parágrafo segundo:</b>&nbsp;Persistindo o atraso, por período superior a 03 (três) meses consecutivos, o&nbsp;<b>CONTRATADO</b>&nbsp;poderá suspender a execução dos serviços, bem como considerar rescindido o presente, comunicando o CONTRATANTE para que constitua novo representante legal no prazo de até 10 dias nos termos do art. 5º, § 3º da lei 8906/94 e art. 6º do Regulamento Geral do Estatuto.<span style="color: inherit;">&nbsp;</span><br></p>  <p><b>Cláusula 3ª -</b>&nbsp;Iniciados os serviços especificados no objeto,&nbsp;ainda que haja mudança de patrocinador da causa, os honorários serão devidos ao&nbsp;<b>CONTRATADO</b>&nbsp;nos termos em que contratados.</p></div>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>                        			
    <div class="ui-draggable"><div style="text-align: justify;" contenteditable="true">
    <p></p><div class="edit" contenteditable="true"><p><b><u>DAS DESPESAS</u></b></p>  <p>&nbsp;</p>  <p><b>Cláusula 4ª -&nbsp;</b>Caso haja qualquer despesa extraordinária e/ou incomum, para o custeio da ação, tais como atualização de documentos, segunda via de documentação, custas judiciais/extrajudiciais, reconhecimento de firmas, locomoção ao fórum, fotocópias, autenticações, emolumentos, entre outros, objeto do presente contrato correm por conta do&nbsp;<b>CONTRATANTE</b>, que se obriga a fornecer as importâncias para as referidas despesas, do que o&nbsp;<b>CONTRATADO</b>&nbsp;deverá fornecer recibo que as comprove.</p></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><div class="edit" contenteditable="true"><p><b><u></u></b></p><div class="edit"><div class="edit" contenteditable="true"><p><b><u></u></b></p></div><div class="edit" style="text-align: justify;"><div class="edit" contenteditable="true"><p><b><u></u></b></p></div><div class="edit"><div class="edit" contenteditable="true"><p><b><u>DA RESCISÃO</u></b></p><p>&nbsp;</p><p><b>Cláusula 5ª -&nbsp;</b>Em caso de desistência por parte do CONTRATANTE, antes de iniciada e enviada a petição inicial para a primeira revisão, será devido ao CONTRATADO, a título de honorários, por assessoria e consultoria jurídica, o valor de 01 (um) salário mínimo vigente.</p><p>Após o recebimento da petição inicial, seja por e-mail, ou aplicativo WhatsApp, o valor dos honorários será cobrado integralmente em caso de desistência.</p><p>Será considerada desistência a comunicação por escrito a este escritório, via e-mail magri@ratsbonemagri.com.br.</p><p>&nbsp;&nbsp;</p><div class="edit" contenteditable="true"><p><b>C</b><b>láusula 6ª</b>&nbsp;- Também será considera-se desistência a recusa por parte do CONTRATANTE, ou de seu cônjuge, em fornecer documentos inerentes a propositura ou devido andamento processual da ação objeto, tais quais: cópia de documentos pessoais, certidões e/ou esclarecimentos.</p><div class="edit"><div class="edit" contenteditable="true"><p>Ainda, será considerada desistência a inércia do CONTRATANTE, e/ou cônjuge, caso deixe de enviar os documentos solicitados pelo Juízo ou Ministério Público.</p><p><br></p></div></div></div><p></p><p><b>Cláusula 7ª -&nbsp;</b>&nbsp;Salienta-se que o prazo comum para juntada de qualquer documento solicitado pelo Juiz é de 05 dias úteis após a publicação, ou seja, é de total responsabilidade do&nbsp;<b>CONTRATANTE</b>&nbsp;cumprir o solicitado pelo escritório para a continuação do processo judicial. Em caso de extinção do feito sem o julgamento do mérito por conta da inércia do&nbsp;<b>CONTRATANTE</b>, sob qualquer hipótese, os honorários deste escritório serão devidos normalmente.<br></p></div><div class="edit"><div class="edit" contenteditable="true"><p><br></p><p>Por fim, por se tratar de divórcio amigável, o&nbsp;<b>CONTRATANTE</b>&nbsp;assume que ambos divorciandos darão sequência na assinatura da petição inicial e procuração, para a devida continuação do processo legal, além do fornecimento de documentos pertinentes.</p></div><div class="edit" contenteditable="true"><p><br></p><p><b>Parágrafo Segundo –&nbsp;</b>Todo e qualquer documento enviado será mantido no servidor por 1 ano a partir do envio, sendo automaticamente descartado após esta data.</p></div></div></div><div class="edit"><div class="edit" contenteditable="true"><p></p></div></div></div><div class="edit"><div class="edit" contenteditable="true"><p></p></div></div></div><div class="edit" contenteditable="true"><p></p></div><p></p></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    
    
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><div class="edit" contenteditable="true"><p><b><u>DA COMUNICAÇÃO E PRAZO</u></b></p><div><b><u><br></u></b></div><p></p><p><b>Cláusula 8ª -&nbsp;</b>O&nbsp;<b>CONTRATADO</b>&nbsp;manterá a comunicação junto a(o) CONTRATANTE baseado nos meios de comunicação fornecidos por este no cadastro inicial, não se responsabilizando por eventual inconsistência nos dados de e-mail ou número telefônico fornecido.<br></p><div class="edit"><div class="edit" contenteditable="true"><p>Parágrafo Terceiro – É de total responsabilidade do<b>&nbsp;CONTRATANTE</b>&nbsp;manter atualizado o meio de contato com o&nbsp;<b>CONTRATADO</b>, sendo que em eventual perda ou troca de número telefônico, deve ser prontamente informada pelo telefone 5083-0000 ou e-mail magri@ratsbonemagri.com.br.</p></div></div><p></p><p><br></p><p><b>Cláusula 9ª -&nbsp;</b>O prazo para elaboração da minuta de divórcio pela parte&nbsp;<b>CONTRATADA</b>&nbsp;é de no máximo 48h, iniciado-se após todas as informações necessárias serem devidamente fornecidas pelo&nbsp;<b>CONTRATANTE</b>.</p><p>Ressaltamos que o atendimento via aplicativo whatsapp é um meio de apoio ao cliente, entretanto as respostas não são automatizadas, sendo respondidas por um dos operadores do escritório. Desta forma, dependendo do fluxo de trabalho, as respostas podem demorar até 48h para serem respondidas. Para assuntos emergenciais, o&nbsp;<b>CONTRATADO</b>&nbsp;disponibiliza o e-mail contato@ratsbonemagri.com.br, e ainda, o telefone do escritório (11)5083-0000.</p><div><b><u><br></u></b></div><div><b>Cláusula 10ª</b>&nbsp;-<b>&nbsp;</b>&nbsp;O&nbsp;<b>CONTRATADO</b>&nbsp;esclarece que qualquer estimativa de prazo para conclusão do divórcio informada ao cliente é baseada em Varas e Fóruns judiciais que estejam com funcionamento normalizado e sem acúmulo processual. Caso o cliente tenha urgência, aconselhamos se atentarem à qualidade da documentação enviada de forma online, bem como atualizar a certidão de casamento, que, em alguns casos, o juiz exige.</div><div contenteditable="true"><p><br></p><div class="edit" contenteditable="true"><p>Portanto, jamais o&nbsp;<b>CONTRATADO</b>&nbsp;se responsabilizará por qualquer atraso, que porventura, ocorra por conta exclusivamente dos responsáveis do poder judiciário.</p><p><br></p><p><b>Parágrafo Único</b>&nbsp;<b>-</b>&nbsp;Os prazos estimados para qualquer tipo de serviço de atualização de documentos, ou averbações, prestados pelo&nbsp;<b>CONTRATADO,</b>&nbsp;dependem exclusivamente do fluxo de trabalho de cada cartório. Assim, o tempo estimado para serviços na cidade de São Paulo é de 7 dias úteis, podendo sofrer variações. Para serviços solicitados a outros cartórios localizados fora do Estado de São Paulo o CONTRATANTE não está apto a informar com precisão o tempo estimado, haja vista a prestação de serviços de outros Estados não ser automatizado.</p><div><br></div></div></div></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div style="text-align: justify;" contenteditable="true">
    <p></p><div class="edit" contenteditable="true"><p><b><u>DA VIGÊNCIA DO CONTRATO</u></b></p>  <p>&nbsp;</p>  <p><b>Cláusula 11ª -&nbsp;</b>Este Contrato vigorará desde a sua assinatura até sentença em primeira instância. Em caso de sentença contrária, a vigência se extinguirá no trânsito em julgado da ação.</p></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    
    
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><div class="edit" style="text-align: justify;" contenteditable="true"><p></p><div class="edit"><div class="edit" contenteditable="true"><p><b><u>DO EXEQUIBILIDADE EXTRAJUDICIAL DO PRESENTE INSTRUMENTO</u></b></p><p>&nbsp;</p><p><b>Cláusula 12ª -&nbsp;&nbsp;</b>É expresso e sabido que o presente instrumento particular de contratação de serviço jurídico é um título executivo extrajudicial, vide artigo 585, II do CPC e artigo 24 da Lei n. 8.906 de 04 de julho de 1994 EOAB.</p><p>Caso haja necessidade de cobrança ou discussão em esfera judicial do presente instrumento, as partes têm ciência que haverá o acréscimo de 20% a título de honorários advocatícios à parte sucumbente.</p></div></div></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    <div class="ui-draggable"><div style="text-align: justify;" contenteditable="true">
    <p></p><div class="edit" contenteditable="true"><p><span style="color: inherit;"><b>C</b></span><b style="color: inherit;">láusula 13ª -&nbsp;</b><span style="color: inherit;">Com renúncia a qualquer outro, por mais privilegiado que seja ou venha a sê-lo, fica eleito o Foro da Comarca da Capital do Estado de São Paulo, para dirimir quaisquer questões oriundas deste instrumento.</span></p></div><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    <div class="ui-draggable"><div contenteditable="true">
    <p></p><hr><p></p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>
    
    
    <div class="ui-draggable"><div contenteditable="true">
    <p><strong>PARTES:</strong> Confirmo, <strong>via assinatura eletrônica</strong>, nos moldes do art. 10 da MP 2.200/01 em vigor no Brasil, que estou De Acordo com o presente CONTRATO, e, por estar plenamente ciente dos termos, reafirmo meu dever de observar e fazer cumprir as cláusulas aqui estabelecidas, em vista do que posso acessar minha via do contrato através do endereço https://secure.d4sign.com.br e gerar versão impressa do mesmo, considerado o fato de já tê-lo recebido por e-mail.</p>
    </div><div class="row-tool" style="right: auto; left: -37px;"><div class="row-handle"><i class="cb-icon-move"></i></div><div class="row-html"><i class="cb-icon-code"></i></div><div class="row-copy"><i class="cb-icon-plus"></i></div><div class="row-remove"><i class="cb-icon-cancel"></i></div></div></div>                        			</div>
</body>
</html>