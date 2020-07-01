<?php
class_exists("Core") ?: die("Classes were loaded in a wrong order!");

class Addresses extends Core {

  private $pluginTable = "address_table";
  private $countries = array
      (
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua And Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia And Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote D\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island & Mcdonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic Of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle Of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States Of',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'AN' => 'Netherlands Antilles',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory, Occupied',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts And Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre And Miquelon',
        'VC' => 'Saint Vincent And Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome And Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia And Sandwich Isl.',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard And Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad And Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks And Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Vietnam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis And Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
      );

  private function printAdress($id) {
    return print_r($this->fetchRow($this->pluginTable, "*", "id=$id"), true);
  }

  public function countrySelector($index) {
    $selector = '<select id="countries" name="country" index=' . array_search($index, $this->countries) . '>';
    foreach ($this->countries as $item) {
      $cc = array_keys($this->countries, $item)[0];
      $selected = $index==$cc ? ' selected="selected"' : '';
      $selector .= '<option value="' . $cc . '"' . $selected . '>' . $item . '</option>';
    }
    return $selector . '</select>';
  }

  public function newAddress($data) {
    $data["names"] = $data["first"] . " " . $data["second"];
    if($this->validateAdress($data)) {
      $this->insertAddress($data); //if invalid the validation will notify us and cancel the script by itself
      return true;
    } else {
      return false;
    }
  }

  private function insertAddress($data) {
  //prepare vars
    $data["entry_date"] = time();
    unset($data["first"]);
    unset($data["second"]);
    /*$names = $raw["names"];
    $surname = $raw["surname"];
    $gender = $raw["gender"];
    $mail = $raw["mail"];
    $street = $raw["street"];
    $hnum = $raw["hnum"];
    $zip = $raw["zip"];
    $country = $raw["country"];*/

  //insert into database

    $this->insertRow($this->pluginTable, $data); //array with keys like columnnames
  }

  private function validateAdress($arr_content) {
    foreach ($arr_content as $item) { if (empty($item)) $this->stopExec("Please fill all fields!"); }

    if (!ctype_alpha(str_replace(' ', '', $arr_content["names"])) || strlen($arr_content["names"]) > 250 ) $this->stopExec("Your name must not be more than 250 characters long and consist of letters only.");
    if (!ctype_alpha(str_replace(' ', '', $arr_content["surname"])) || strlen($arr_content["surname"]) > 250 ) $this->stopExec("Your surname must not be more than 250 characters long and consist of letters only.");
    if (!($arr_content["gender"] == 0 || $arr_content["gender"] == 1 || $arr_content["gender"] == 2)) $this->stopExec("Your Gender has to be \"something\".");
    if (!($this->isMail($arr_content["mail"]))) $this->stopExec("Your E-Mail-Address seems to be invalid.");
    if (!ctype_alnum($arr_content["street"]) || strlen($arr_content["street"]) > 250) $this->stopExec("Your street must be less than 250 characters long and alphanumeric.");
    if (!ctype_digit($arr_content["hnum"]) || strlen($arr_content["hnum"]) > 250) $this->stopExec("Your housenumber must be less than 250 characters long and numeric.");
    if (!ctype_digit($arr_content["zip"]) || strlen($arr_content["zip"]) > 5) $this->stopExec("Your ZIP-Code must be less than 6 characters long and numeric.");
    if (!ctype_alpha(str_replace(' ', '', $arr_content["city"])) || strlen($arr_content["city"]) > 250) $this->stopExec("Your City must be less than 250 characters long and consist of letters only.");
    if (!ctype_alpha(str_replace(' ', '', $arr_content["country"])) || strlen($arr_content["country"]) > 2 || in_array($arr_content["country"], $this->countries)) $this->stopExec("Your Countrycode has to be 2 characters long and consist of letters only.");

    //Template for validation
    //if (!ctype_alnum($arr_content[""]) || !ctype_alpha($arr_content[""]) || !ctype_digit($arr_content[""]) || strlen($arr_content[""]) > 250) $this->stopExec("***** has to be ***** characters long and alphanumeric.");
    return true;
  }

  //the functions for these are that short that this isnt necessary
  /*private function isNum($test) {}
  private function isAlpha($test) {}
  private function isAlphaNum($test) {}*/
  private function isMail($test) { return filter_var($test, FILTER_VALIDATE_EMAIL) ? true : false; }

  public function listAdresses () {
    //array aus der datenbank holen und mit foreach printAdress aufrufen -> verworfen
    $result = parent::fetchRows($this->pluginTable, "*");
    //print_r($result);

    if (count($result) > 0): ?>
      <table>
        <thead>
          <tr>
            <th><?php echo implode('</th><th>', array_keys(current($result))); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row): $row;
            $row["id"] = '<a href="edit.php?id=' . $row["id"] . '">Edit</a> &nbsp; <a href="delete.php?id=' . $row["id"] . '">Delete</a>';
            $row["gender"] = $this->translateGender($row["gender"]);
            $row["mail"] = '<a href="mailto:' . $row["mail"] . '">' . $row["mail"] . '</a>';
            $row["country"] = $this->translateCountry($row["country"]);
          ?>
          <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
          </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif;
  }

  public function addressSelector ($target) {
    $result = parent::fetchRows($this->pluginTable, "id, mail");

    foreach ($result as $item) {
      echo '<a href="' . $target . '?id=' . $item["id"] . '">' . $item["mail"] . '</a><br>';
    }
  }

  private function translateCountry($code) {
    return $this->countries[$code];
  }

  private function translateGender($gender_id) {
    switch($gender_id) {
      case 0:
        return "undecided";
      break;
      case 1:
        return "male";
      break;
      case 2:
        return "female";
      break;
    }
  }
}