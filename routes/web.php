<?php

Route::get('/','formsControler@index');
Route::get('/detalleFormulario/{id}','formsControler@detalleFrm')->where('id','[0-9]+');
Route::post('/registroRespuesta','formsControler@addRespuesta');
Route::get('/registroOkMessage','formsControler@registroOk');
Route::get('/respuestas','formsControler@respuestas');






