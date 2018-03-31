<?php

Route::get('toneFromPitch/{pitch}', 'Ihansson\PitchToTone\PitchToToneController@toneFromPitch');

Route::get('pitchFromTone/{tone}', 'Ihansson\PitchToTone\PitchToToneController@pitchFromTone');