var global_data;

function start()
{
	get_countries();
		
		on_filter_change();
}


function on_filter_change()
{
	var success = null;
	
	get_data(); // get_all data in json format
}

function dummy_function()
{
		for(i=0; i<global_data.length; i++)
		{
			var data_item = global_data[i];

			alert(data_item.country);
			alert(data_item.year);
			alert(data_item.area_type);
			alert(data_item.health_type);
			alert(data_item.value);
		}
}

// This function gets all of the country data and places it on the map
function get_data()
{
	var year 				= $('#input_year').val();
	var area_type 			= $('#input_area_type').val();
	var health_type 		= $('#input_health_type').val();
	var population_portion 	= $('#input_population_portion').val();
	var country            	= $('#input_country').val(); // country code

	var time_slider		 = 5 * $('#ts').val() + 1990;
	
	//$('#input_year').val( time_slider );

	var url = "data_json.php";
	var map = {};
	
	map.year 			= year;
	map.area_type 		= area_type;
	map.health_type 	= health_type;
	map.country_code     	= country;
	
	jQuery.getJSON( url, map, receive_get_data );
	
	function receive_get_data(doc,text_status)
	{ 
		var map_value_data = {};
	    var line_chart_data = [];  // chart9 data
		var scatter_chart_data = [];  // chart data
		var barData = [];  // data for comparison bar chart
	
			// default dummy data
			barData[0] = {"year":'1990', "cA":0, "cB":0};
			barData[1] = {"year":'1995', "cA":0, "cB":0};
			barData[2] = {"year":'2000', "cA":0, "cB":0};
			barData[3] = {"year":'2005', "cA":0, "cB":0};
			barData[4] = {"year":'2010', "cA":0, "cB":0};
			barData[5] = {"year":'2012', "cA":0, "cB":0};
	
	
		var ai = 0;
		var bi = 0;
	
		global_data = doc;
		
		
		$('#raw_data').empty();

	
		for(i=0; i<doc.length; i++)
		{
			var project = doc[i];

			var tr = document.createElement('tr');
			
			var th_name 			= document.createElement('td'); // country
			var th_project_id 		= document.createElement('td'); // 
			var th_etsy_username 	= document.createElement('td'); // 
			var th_email_address 	= document.createElement('td'); // 
			var th_actions 			= document.createElement('td'); // 
			/*
			var project_link 			= document.createElement('a');
			project_link.href = 'view_project.php?project='+project.project;
			project_link.appendChild( document.createTextNode( project.name  ));
			
			var edit_link 			= document.createElement('a');
			edit_link.href = 'view_project.php?project='+project.project;
			edit_link.appendChild( document.createTextNode('Edit'));
			
			var delete_link 			= document.createElement('a');
			delete_link.href = 'javascript: delete_project('+project.project+')';
			delete_link.appendChild( document.createTextNode('Delete'));
			delete_link.className = 'delete_link';
			
			th_name.appendChild(  document.createTextNode( project.project ) );
			th_project_id.appendChild( project_link  );
			th_etsy_username.appendChild( document.createTextNode( project.description ) );
			th_email_address.appendChild( document.createTextNode( project.created ) );
			
			th_actions.appendChild( edit_link );
			th_actions.appendChild( document.createTextNode('  -') );
			th_actions.appendChild( delete_link );
			*/
			
			th_name.appendChild( 			document.createTextNode( project.country + ' (' + project.country_code +')' ));
		    th_project_id.appendChild( 		document.createTextNode( project.year  										));
		    th_etsy_username.appendChild( 	document.createTextNode( project.area_type 								 	));
		    th_email_address.appendChild( 	document.createTextNode( project.health_type  								));
			th_actions.appendChild( 		document.createTextNode( project.value + '%' 									));
			
			map_value_data[project.country_code] = project.value;
			
			
			$(tr).append(th_name);
			$(tr).append(th_project_id);
			$(tr).append(th_etsy_username);
			$(tr).append(th_email_address);
			$(tr).append(th_actions);
			
			$('#raw_data').append(tr); // add data to raw data table
			
			//create data object for line graph data
			line_chart_data[i] = {};
			line_chart_data[i].date = project.year;
			line_chart_data[i].visits = project.value;
			
			
			//create data object for scatter graph data
			scatter_chart_data[i] = {};
			
			if( project.health_type == 'Water' )
			{
				scatter_chart_data[ai].ax = project.year;	// country year for water
				scatter_chart_data[ai].ay = project.value;	// country value for water
				ai++;
			}
			
			if(project.health_type == 'Sanitation')
			{
				scatter_chart_data[bi].bx = project.year;  // country year for septic
				scatter_chart_data[bi].by = project.value;  // country value for septic (sanitation)
				bi++;
			}
			
			// filter out data for bar chart for country comparisons, store in barData array
			var cA = $('#input_country_A').val();
			var cB = $('#input_country_B').val();
			var current_country = project.country_code; // country for this current loop i line
			var c_year = project.year; // current year in loop item i
			
			
			
	
			
			if( (cA == current_country) || (cB == current_country) )
			{
				
				if(cA == current_country)
				{
					
					if( c_year == '1990' )
					{
						barData[0]["cA"] = project.value;
					}
					else if( c_year == '1995' )
					{
						barData[1]["cA"] = project.value;
					}
					else if( c_year == '2000' )
					{
						barData[2]["cA"] = project.value;
					}
					else if( c_year == '2005' )
					{
						barData[3]["cA"] = project.value;
					}
					else if( c_year == '2010' )
					{
						barData[4]["cA"] = project.value;
					}
					else if( c_year == '2012' )
					{
						barData[5]["cA"] = project.value;
					}
				}
				else if(cB == current_country)
				{
					if( c_year == '1990' )
					{
						barData[0]["cB"] = project.value;
					}
					else if( c_year == '1995' )
					{
						barData[1]["cB"] = project.value;
					}
					else if( c_year == '2000' )
					{
						barData[2]["cB"] = project.value;
					}
					else if( c_year == '2005' )
					{
						barData[3]["cB"] = project.value;
					}
					else if( c_year == '2010' )
					{
						barData[4]["cB"] = project.value;
					}
					else if( c_year == '2012' )
					{
						barData[5]["cB"] = project.value;
					}
				}
			}
		}

			//dummy_function();	
			console.log(map_value_data);
			
			// update map
			
				$(function(){
            $('#world-map').empty().vectorMap({
              map: 'world_mill_en',
              backgroundColor: 'b1b1b1',
              series: {
                regions: [{
                  values: map_value_data,
                  scale: ['#808000', '#0071A4'],
                  normalizeFunction: 'linear'
                }]
              },
              hoverOpacity: 0.7,
              hoverColor: false,
			 onRegionClick : updateCountryDropDown
            });
          });
		  
		  // sort line data for line graph
		  line_chart_data.sort(function(a,b){
			  // Turn your strings into dates, and then subtract them
			  // to get a value that is either negative, positive, or zero.
			  return a.date - b.date;
			});
					  
		
			if( 	($('#input_country').val() != 0) &&
					($('#input_area_type').val() != 0) &&
					($('#input_health_type').val() != 0)
				)
			{
				// update line graph data, only if health type, country, and area type filters are selected
				chart7.dataProvider = line_chart_data;
				chart7.validateData(); 
				$('#li_country_prog').removeClass('disabled');
			}  
		  
			// update scatter plot title
		    $('#country_name_ws').empty().text(  $('#input_country option:selected').text()+'\'s '+$('#input_area_type').val() +' ' );
		  
			// update "Water" "Sanitation" label on title
			$('#type_label').empty().text( $('#input_country option:selected').text() + '\'s ' + $('#input_health_type').val() + ' progress in an ' + $('#input_area_type').val() + ' context. ' );
		  
			if( 	($('#input_country').val() != 0) &&
					($('#input_area_type').val() != 0)
				)
			{
				// update scatter data
				chart.dataProvider = scatter_chart_data;
				chart.validateData(); 
				$('#li_water_prog').removeClass('disabled');
			}
			
			//--------------------------------------------------------------
			//  Update data for country comparisons bar chart
			chart9.dataProvider = barData;
			chart9.validateData(); 
			
		}
}


// get all countries and populate country dropdown list
function get_countries()
{
	var map = {};
	
	var url = 'get_codes_array.php';

	jQuery.getJSON( url, map, receive_get_codes );
	
	function receive_get_codes(doc, status)
	{
	
		for( i=0; i<doc.length; i++ )
		{
			var countryCode = doc[i];
		
			var option = document.createElement('option');
			option.value = countryCode; // 2 letter iso code
			option.appendChild( document.createTextNode( getCountryName(countryCode) ));
			
			var option1 = document.createElement('option');
			option1.value = countryCode; // 2 letter iso code
			option1.appendChild( document.createTextNode( getCountryName(countryCode) ));
			
			var option2 = document.createElement('option');
			option2.value = countryCode; // 2 letter iso code
			option2.appendChild( document.createTextNode( getCountryName(countryCode) ));
		
			$( '#input_country' ).append( option ); // append to main filter
			$( '#input_country_A' ).append( option1 );  // append to comparison filter
			$( '#input_country_B' ).append( option2 );  // append to comparison
		}
	
	}
}

// below code used to translate country names from iso code to readable name

var isoCountries = {
    'AF' : 'Afghanistan',
    'AX' : 'Aland Islands',
    'AL' : 'Albania',
    'DZ' : 'Algeria',
    'AS' : 'American Samoa',
    'AD' : 'Andorra',
    'AO' : 'Angola',
    'AI' : 'Anguilla',
    'AQ' : 'Antarctica',
    'AG' : 'Antigua And Barbuda',
    'AR' : 'Argentina',
    'AM' : 'Armenia',
    'AW' : 'Aruba',
    'AU' : 'Australia',
    'AT' : 'Austria',
    'AZ' : 'Azerbaijan',
    'BS' : 'Bahamas',
    'BH' : 'Bahrain',
    'BD' : 'Bangladesh',
    'BB' : 'Barbados',
    'BY' : 'Belarus',
    'BE' : 'Belgium',
    'BZ' : 'Belize',
    'BJ' : 'Benin',
    'BM' : 'Bermuda',
    'BT' : 'Bhutan',
    'BO' : 'Bolivia',
    'BA' : 'Bosnia And Herzegovina',
    'BW' : 'Botswana',
    'BV' : 'Bouvet Island',
    'BR' : 'Brazil',
    'IO' : 'British Indian Ocean Territory',
    'BN' : 'Brunei Darussalam',
    'BG' : 'Bulgaria',
    'BF' : 'Burkina Faso',
    'BI' : 'Burundi',
    'KH' : 'Cambodia',
    'CM' : 'Cameroon',
    'CA' : 'Canada',
    'CV' : 'Cape Verde',
    'KY' : 'Cayman Islands',
    'CF' : 'Central African Republic',
    'TD' : 'Chad',
    'CL' : 'Chile',
    'CN' : 'China',
    'CX' : 'Christmas Island',
    'CC' : 'Cocos (Keeling) Islands',
    'CO' : 'Colombia',
    'KM' : 'Comoros',
    'CG' : 'Congo',
    'CD' : 'Congo, Democratic Republic',
    'CK' : 'Cook Islands',
    'CR' : 'Costa Rica',
    'CI' : 'Cote D\'Ivoire',
    'HR' : 'Croatia',
    'CU' : 'Cuba',
    'CY' : 'Cyprus',
    'CZ' : 'Czech Republic',
    'DK' : 'Denmark',
    'DJ' : 'Djibouti',
    'DM' : 'Dominica',
    'DO' : 'Dominican Republic',
    'EC' : 'Ecuador',
    'EG' : 'Egypt',
    'SV' : 'El Salvador',
    'GQ' : 'Equatorial Guinea',
    'ER' : 'Eritrea',
    'EE' : 'Estonia',
    'ET' : 'Ethiopia',
    'FK' : 'Falkland Islands (Malvinas)',
    'FO' : 'Faroe Islands',
    'FJ' : 'Fiji',
    'FI' : 'Finland',
    'FR' : 'France',
    'GF' : 'French Guiana',
    'PF' : 'French Polynesia',
    'TF' : 'French Southern Territories',
    'GA' : 'Gabon',
    'GM' : 'Gambia',
    'GE' : 'Georgia',
    'DE' : 'Germany',
    'GH' : 'Ghana',
    'GI' : 'Gibraltar',
    'GR' : 'Greece',
    'GL' : 'Greenland',
    'GD' : 'Grenada',
    'GP' : 'Guadeloupe',
    'GU' : 'Guam',
    'GT' : 'Guatemala',
    'GG' : 'Guernsey',
    'GN' : 'Guinea',
    'GW' : 'Guinea-Bissau',
    'GY' : 'Guyana',
    'HT' : 'Haiti',
    'HM' : 'Heard Island & Mcdonald Islands',
    'VA' : 'Holy See (Vatican City State)',
    'HN' : 'Honduras',
    'HK' : 'Hong Kong',
    'HU' : 'Hungary',
    'IS' : 'Iceland',
    'IN' : 'India',
    'ID' : 'Indonesia',
    'IR' : 'Iran, Islamic Republic Of',
    'IQ' : 'Iraq',
    'IE' : 'Ireland',
    'IM' : 'Isle Of Man',
    'IL' : 'Israel',
    'IT' : 'Italy',
    'JM' : 'Jamaica',
    'JP' : 'Japan',
    'JE' : 'Jersey',
    'JO' : 'Jordan',
    'KZ' : 'Kazakhstan',
    'KE' : 'Kenya',
    'KI' : 'Kiribati',
    'KR' : 'Korea',
    'KW' : 'Kuwait',
    'KG' : 'Kyrgyzstan',
    'LA' : 'Lao People\'s Democratic Republic',
    'LV' : 'Latvia',
    'LB' : 'Lebanon',
    'LS' : 'Lesotho',
    'LR' : 'Liberia',
    'LY' : 'Libyan Arab Jamahiriya',
    'LI' : 'Liechtenstein',
    'LT' : 'Lithuania',
    'LU' : 'Luxembourg',
    'MO' : 'Macao',
    'MK' : 'Macedonia',
    'MG' : 'Madagascar',
    'MW' : 'Malawi',
    'MY' : 'Malaysia',
    'MV' : 'Maldives',
    'ML' : 'Mali',
    'MT' : 'Malta',
    'MH' : 'Marshall Islands',
    'MQ' : 'Martinique',
    'MR' : 'Mauritania',
    'MU' : 'Mauritius',
    'YT' : 'Mayotte',
    'MX' : 'Mexico',
    'FM' : 'Micronesia, Federated States Of',
    'MD' : 'Moldova',
    'MC' : 'Monaco',
    'MN' : 'Mongolia',
    'ME' : 'Montenegro',
    'MS' : 'Montserrat',
    'MA' : 'Morocco',
    'MZ' : 'Mozambique',
    'MM' : 'Myanmar',
    'NA' : 'Namibia',
    'NR' : 'Nauru',
    'NP' : 'Nepal',
    'NL' : 'Netherlands',
    'AN' : 'Netherlands Antilles',
    'NC' : 'New Caledonia',
    'NZ' : 'New Zealand',
    'NI' : 'Nicaragua',
    'NE' : 'Niger',
    'NG' : 'Nigeria',
    'NU' : 'Niue',
    'NF' : 'Norfolk Island',
    'MP' : 'Northern Mariana Islands',
    'NO' : 'Norway',
    'OM' : 'Oman',
    'PK' : 'Pakistan',
    'PW' : 'Palau',
    'PS' : 'Palestinian Territory, Occupied',
    'PA' : 'Panama',
    'PG' : 'Papua New Guinea',
    'PY' : 'Paraguay',
    'PE' : 'Peru',
    'PH' : 'Philippines',
    'PN' : 'Pitcairn',
    'PL' : 'Poland',
    'PT' : 'Portugal',
    'PR' : 'Puerto Rico',
    'QA' : 'Qatar',
    'RE' : 'Reunion',
    'RO' : 'Romania',
    'RU' : 'Russian Federation',
    'RW' : 'Rwanda',
    'BL' : 'Saint Barthelemy',
    'SH' : 'Saint Helena',
    'KN' : 'Saint Kitts And Nevis',
    'LC' : 'Saint Lucia',
    'MF' : 'Saint Martin',
    'PM' : 'Saint Pierre And Miquelon',
    'VC' : 'Saint Vincent And Grenadines',
    'WS' : 'Samoa',
    'SM' : 'San Marino',
    'ST' : 'Sao Tome And Principe',
    'SA' : 'Saudi Arabia',
    'SN' : 'Senegal',
    'RS' : 'Serbia',
    'SC' : 'Seychelles',
    'SL' : 'Sierra Leone',
    'SG' : 'Singapore',
    'SK' : 'Slovakia',
    'SI' : 'Slovenia',
    'SB' : 'Solomon Islands',
    'SO' : 'Somalia',
    'ZA' : 'South Africa',
    'GS' : 'South Georgia And Sandwich Isl.',
    'ES' : 'Spain',
    'LK' : 'Sri Lanka',
    'SD' : 'Sudan',
    'SR' : 'Suriname',
    'SJ' : 'Svalbard And Jan Mayen',
    'SZ' : 'Swaziland',
    'SE' : 'Sweden',
    'CH' : 'Switzerland',
    'SY' : 'Syrian Arab Republic',
    'TW' : 'Taiwan',
    'TJ' : 'Tajikistan',
    'TZ' : 'Tanzania',
    'TH' : 'Thailand',
    'TL' : 'Timor-Leste',
    'TG' : 'Togo',
    'TK' : 'Tokelau',
    'TO' : 'Tonga',
    'TT' : 'Trinidad And Tobago',
    'TN' : 'Tunisia',
    'TR' : 'Turkey',
    'TM' : 'Turkmenistan',
    'TC' : 'Turks And Caicos Islands',
    'TV' : 'Tuvalu',
    'UG' : 'Uganda',
    'UA' : 'Ukraine',
    'AE' : 'United Arab Emirates',
    'GB' : 'United Kingdom',
    'US' : 'United States',
    'UM' : 'United States Outlying Islands',
    'UY' : 'Uruguay',
    'UZ' : 'Uzbekistan',
    'VU' : 'Vanuatu',
    'VE' : 'Venezuela',
    'VN' : 'Viet Nam',
    'VG' : 'Virgin Islands, British',
    'VI' : 'Virgin Islands, U.S.',
    'WF' : 'Wallis And Futuna',
    'EH' : 'Western Sahara',
    'YE' : 'Yemen',
    'ZM' : 'Zambia',
    'ZW' : 'Zimbabwe'
};
 
function getCountryName(countryCode) {
    if (isoCountries.hasOwnProperty(countryCode)) {
        return isoCountries[countryCode];
    } else {
        return countryCode;
    }
}

function comp_init()
{
	var country_A = $('#input_country_A').val();
	var country_B = $('#input_country_B').val();

	on_filter_change();
}

function clear_filters() // clear/reset all filter
{
	$('#input_country').val(0);
	$('#input_year').val(0);
	$('#input_area_type').val(0);
	$('#input_health_type').val(0);
	$('#input_population_portion').val(0);
	on_filter_change();
	
}

function z_open()
{
	$('#myModal').css({
		zIndex: 100000000,
		
	});
}