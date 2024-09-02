/* FUNCIONES */

function ingresar_rut(elemento)
{
    var rut_bruto = document.getElementById(elemento).value;
    rut_bruto = rut_bruto.toUpperCase();
	var rut = "";

	for(var i = 0; i < rut_bruto.length; i++)
	{
		if((rut_bruto.substr(i, 1).charCodeAt(0) >= 48 && rut_bruto.substr(i, 1).charCodeAt(0) <= 57) || rut_bruto.substr(i, 1).charCodeAt(0) == 75 || rut_bruto.substr(i, 1).charCodeAt(0) == 107)
		{
			rut = rut.concat(rut_bruto.substr(i, 1));
		}
	}

	if(rut.length >= 2 && rut.length <= 9)
	{
		var rut_aux = "";
		var s1 = '';
		var s2 = '';
		var s3 = '';
		var dv = rut.substr((rut.length - 1), 1);

		if(rut.length <= 4)
		{
			s3 = rut.substr(0, (rut.length - 1));
			rut_aux = rut_aux.concat(s3);
		}
		else if(rut.length <= 7)
		{
			s2 = rut.substr(0, (rut.length - 4));
			s3 = rut.substr((rut.length - 4), 3);
			rut_aux = rut_aux.concat(s2);
			rut_aux = rut_aux.concat('.');
			rut_aux = rut_aux.concat(s3);
		}
		else if(rut.length >= 8)
		{
			s1 = rut.substr(0, (rut.length - 7));
			s2 = rut.substr((rut.length - 7), 3);
			s3 = rut.substr((rut.length - 4), 3);
			rut_aux = rut_aux.concat(s1);
			rut_aux = rut_aux.concat('.');
			rut_aux = rut_aux.concat(s2);
			rut_aux = rut_aux.concat('.');
			rut_aux = rut_aux.concat(s3);
		}

		rut_aux = rut_aux.concat('-');
		rut_aux = rut_aux.concat(dv);
        rut = rut_aux;
	}

	document.getElementById(elemento).value = rut;
}

function validar_rut(rut_bruto)
{
    rut_bruto = rut_bruto.toUpperCase();
    let rut = [];
    var dv = -1;
    var operacion = 0;

    if(rut_bruto.length >= 11 && rut_bruto.length <= 12)
    {
        for(var i = 0; i < rut_bruto.length; i++)
        {
            if((rut_bruto.substr(i, 1).charCodeAt(0) >= 48 && rut_bruto.substr(i, 1).charCodeAt(0) <= 57) || (rut_bruto.substr(i, 1).charCodeAt(0) == 75 && i == (rut_bruto.length - 1)))
            {
                rut.push(rut_bruto.substr(i, 1));
            }
            else
            {
                if(rut_bruto.substr(i, 1).charCodeAt(0) < 45 || rut_bruto.substr(i, 1).charCodeAt(0) > 46)
                {
                    return false;
                }
            }
        }

        var rut_aux = rut;
        rut = [];
        i = rut_aux.length - 1;

        while(i >= 0)
        {
            rut.push(rut_aux[i]);
            i--;
        }

        var serie = 2;

        for(var i = 0; i < rut.length; i++)
        {
            if(i == 0)
            {
                if(rut[i] == 'K')
                {
                    dv = 10;
                }
                else
                {
                    dv = parseInt(rut[i]);

                    if(dv == 0)
                    {
                        dv = 11;
                    }
                }
            }
            else
            {
                operacion = operacion + (parseInt(rut[i]) * serie);
                serie++;

                if(serie > 7)
                {
                    serie = 2;
                }
            }
        }

        operacion = operacion % 11;
        operacion = 11 - operacion;

        if(dv == operacion)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}