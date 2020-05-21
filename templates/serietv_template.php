{ "collection" :
    {
        "title" : "SeriesTv Database",
            "type" : "SeriesTv",
            "version" : "1.0",
            "href" : "{{ path_for('seriestv')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/seriestv","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"}
				{"rel" : "collection", "href" : "{{ path_for('seriestv') }}","prompt":"Series TV"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('seriestv') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la serie"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción de la serie"},
							{"name" : "director", "value" : "{{ item.director }}", "prompt" : "Director"},
							{"name" : "season", "value" : "{{ item.season }}", "prompt" : "Temporada"},
							{"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},
							{"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Trailer en Youtube"}   
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre de la serie"},
                {"name" : "description", "value" : "", "prompt" : "Descripción de la serie"},
                {"name" : "director", "value" : "", "prompt" : "Director"},
                {"name" : "season", "value" : "", "prompt" : "Temporada"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
                {"name" : "embedUrl", "value" : "", "prompt" : "Trailer en Youtube"}
            ]
                }
    } 
}




