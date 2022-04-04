<?php

return [

    /*
     | Default arguments for Puppeteer.
     */
    'args' => ['--disable-web-security'],

    /*
     | CSS media type for PDF - screen or print.
    */
    'media' => 'screen',

    /*
     | Viewport width and minimum height in pixels.
     */
    'width' => 1920,
    'minHeight' => 100,

    /*
     | Show background.
     */
    'background' => true,

    /*
     | Count of pages (0 for auto).
     */
    'pages' => 1,

    /*
     | Margins of paper in pixels.
     */
    'margins' => [0, 0, 0, 0],

    /*
     | Paper options.
     */
    'paperSize' => [0, 0],
    'format' => null,

    /*
     | Timeout of process in seconds.
     */
    'timeout' => 120,

    /*
     | True, false or null.
     | null will use sandbox only for Windows.
     */
    'sandbox' => null,

    /*
    | Wait for javascript global variable or delay before generating PDF (must be variable or delay).
    | Waiting Value must be global variable name if waitingType is variable.
    | Waiting Value must be number of seconds if waitingType is delay.
    | Null will disable waiting.
    | You can set waiting timeout in seconds for variable type (0 will disable timeout).
    */
    'waitingType' => 'variable',
    'waitingValue' => null,
    'defaultWaitingVariable' => 'ready',
    'variableWaitingTimeout' => 10,
];
