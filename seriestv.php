<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Seriestv extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

// Añadir el resto del código aquí
$app->get('/seriestv', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de series

    // Obtenemos la lista de series de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $series = json_decode(\Seriestv::all());

    // Mostramos la vista
    return $this->view->render($res, 'serietvlist_template.php', [
        'items' => $series
    ]);
})->setName('seriestv');


/*  Obtención de una serie tv en concreto  */
$app->get('/seriestv/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la serie tv pasada como parámetro

    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Seriestv::find($args['name']);  
    $serie = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'serietv_template.php', [
        'item' => $serie
    ]);

});

/*  Eliminacion de una serie tv en concreto  */
$app->delete('/seriestv/{name}', function ($req, $res, $args) {
	
    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Seriestv::find($args['name']); 
    $p->delete();

});

/*Crea una nueva serie tv con los datos recibidos*/
$app->post('/seriestv', function ($req, $res, $args) {
    //Código para peticiones de POST (creación de items)
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];  

    $longitud = count($datos);
    for($i=0; $i<$longitud; $i++)
    {
        switch ($datos[$i]['name']){
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $desc = $datos[$i]['value'];
            break;
        case "director":
            $director = $datos[$i]['value'];
            break;
		case "season":
            $season = $datos[$i]['value'];
            break;
        case "datePublished":
            $date = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;		
        }    
    }
  
    $seriestv = new Serietv;
    $seriestv->name = $name;
    $seriestv->description = $desc;
    $seriestv->director = $director;
    $seriestv->season =  $season;
    $seriestv->datePublished = $date;
    $seriestv->embedUrl = $embedUrl;
  
    $seriestv->save();
});


//Actualizar series tv

$app->put('/seriestv/{name}', function ($req, $res, $args) {

	// Creamos un objeto collection + json con la serie tv pasada como parámetro

	// Obtenemos la serie tv de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
	$nuevo_serietv = \Seriestv::find($args['name']);	

    $template = $req->getParsedBody();

	$datos = $template['template']['data'];
  	foreach ($datos as $item)
  	{ 
		switch($item['name'])
		{
        case "name":
            $name = $item['value'];
            break;
			
        case "description":
            $description = $item['value'];
            break;
			
        case "director":
            $director = $item['value'];
            break;

        case "season":
            $season = $item['value'];
            break;
			
        case "embedUrl":
            $embedUrl = $item['value'];
            break;
			
        case "datePublished":
            $datePublished = $item['value'];
            break;
		}
	}

	$nueva_serietv['name'] = $name;
	$nueva_serietv['description'] = $description;
	$nueva_serietv['director'] = $director;
	$nueva_serietv['season'] = $season;
	$nueva_serietv['embedUrl'] = $embedUrl;
	$nueva_serietv['datePublished'] = $datePublished;
	$nueva_serietv->save();

});


?>
