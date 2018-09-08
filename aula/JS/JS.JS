	candidatos =
	{
		'17':'Bolsonaro',
		'18':'Marina',
		'12':'Ciro',
		'45':'Alckmin',
		'19':'Alvaro',
		'15':'Meirelles',
		'50':'Boulos',
		'27':'Eymael',
		'51':'Daciolo',
		'30':'Amoêdo',
		'54':'Goulart',
		'16':'Vera',
	}

	totv = 
	{
		'17':0,
		'18':0,
		'12':0,
		'45':0,
		'19':0,
		'15':0,
		'50':0,
		'27':0,
		'51':0,
		'30':0,
		'54':0,
		'16':0,
	}


function c2018 ()
{	

	voto = document.getElementById("votos").value + ''; 
	totv[voto] = totv[voto] +1;
	alert("voto: " + voto);
	alert("Total de votos do candidato nº " +voto+": " + totv[voto]);

}

function resultado ()
{
	var min = 0;

	for (i=0; i < totv.length; i++)
	{
		if (totv[i] > min)
		{
			min = totv[i];
		}

		else
			alert(min);
	}
}

