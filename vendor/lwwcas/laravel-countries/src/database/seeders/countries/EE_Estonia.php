<?php
 
namespace Lwwcas\LaravelCountries\Database\Seeders\Countries;

use Illuminate\Database\Seeder;
use Lwwcas\LaravelCountries\Database\Seeders\Builder;

class EE_Estonia extends Seeder
{
 
    /**
     * Attribute that defines the language of countries
     *
     * @var string
     */
    public $lang = 'en';
 
    /**
     * Attribute that defines the language of countries
     *
     * @var string
     */
    public $region = 'europe';
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->name = 'Estonia';
        $this->official_name = 'Republic of Estonia';
        $this->iso_alpha_2 = 'EE';
        $this->iso_alpha_3 = 'EST';
        $this->iso_numeric = '233';
        $this->international_phone = '372';
 
        $this->languages = ['et'];
        $this->tld = ['.ee'];
        $this->wmo = 'EO';
        $this->geoname_id = '453733';
 
        $this->emoji = [
            'img' => '🇪🇪',
            'uCode' => 'U+1F1EA U+1F1EA',
        ];
        $this->color = [
            'hex' => [
                '#0000ff',
                '#000000',
                '#ffffff',
            ],
            'rgb' => [
                '0,0,255',
                '0,0,0',
                '255,255,255',
            ],
        ];
        $this->coordinates = [
            'latitude' => [
                'classic' => '59 00 N',
                'desc' => '58.69374465942383',
            ],
            'longitude' => [
                'classic' => '26 00 E',
                'desc' => '25.24162483215332',
            ],
        ];
        $this->coordinates_limit = [
            'latitude' => [
                'max' => '59.983333',
                'min' => '57.521389',
            ],
            'longitude' => [
                'max' => '28.883333',
                'min' => '21.795833',
            ],
        ];
 
        $this->geographical = json_decode($this->geographical(), true);
 
        Builder::country($this);
    }
 
    public function geographical()
    {
        return '{
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": { "cca2": "ee" },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [23.990829, 58.099998],
              [23.97805, 58.097771],
              [23.962772, 58.09943],
              [23.952774, 58.103607],
              [23.944996, 58.108604],
              [23.938885, 58.114441],
              [23.938606, 58.122765],
              [23.939995, 58.131935],
              [23.94305, 58.139992],
              [23.94777, 58.147217],
              [23.955551, 58.152489],
              [23.964996, 58.156654],
              [23.97916, 58.15777],
              [23.994717, 58.156097],
              [24.006386, 58.152771],
              [24.016109, 58.1486],
              [24.022186, 58.14275],
              [24.024719, 58.137215],
              [24.02528, 58.128876],
              [24.015831, 58.114441],
              [24.00972, 58.10833],
              [24.001663, 58.10332],
              [23.990829, 58.099998]
            ]
          ],
          [
            [
              [22.990829, 58.597771],
              [23.090832, 58.564438],
              [23.263054, 58.496101],
              [23.273052, 58.491936],
              [23.289165, 58.482208],
              [23.319717, 58.46166],
              [23.332218, 58.449997],
              [23.332775, 58.441658],
              [23.328053, 58.434433],
              [23.2675, 58.429436],
              [23.25, 58.430275],
              [23.226105, 58.43665],
              [23.206104, 58.444992],
              [23.198051, 58.44971],
              [23.142494, 58.443604],
              [23.076942, 58.413879],
              [23.064163, 58.385826],
              [23.02861, 58.357773],
              [22.756943, 58.240273],
              [22.648884, 58.23027],
              [22.58194, 58.241104],
              [22.520554, 58.242218],
              [22.487495, 58.242218],
              [22.474995, 58.241936],
              [22.37833, 58.223045],
              [22.367496, 58.219711],
              [22.288609, 58.188042],
              [22.279163, 58.183876],
              [22.271664, 58.178604],
              [22.26722, 58.171379],
              [22.266388, 58.163879],
              [22.269165, 58.15638],
              [22.273609, 58.149719],
              [22.276108, 58.142494],
              [22.264721, 58.102219],
              [22.261944, 58.09388],
              [22.202496, 57.986107],
              [22.09916, 57.93055],
              [22.07333, 57.91666],
              [22.051662, 57.909714],
              [22.037777, 57.908325],
              [22.022221, 57.909714],
              [22.01028, 57.913048],
              [22.000553, 57.91694],
              [21.99416, 57.922768],
              [21.980549, 57.958046],
              [21.985828, 57.976379],
              [22.082218, 58.07666],
              [22.089718, 58.08194],
              [22.10055, 58.085266],
              [22.112495, 58.083878],
              [22.151108, 58.08638],
              [22.197216, 58.137497],
              [22.201385, 58.144714],
              [22.196941, 58.151382],
              [22.188606, 58.15638],
              [22.17694, 58.159431],
              [22.145275, 58.1586],
              [22.131664, 58.16082],
              [22.07861, 58.17083],
              [22.068607, 58.174713],
              [21.884441, 58.25222],
              [21.869717, 58.262497],
              [21.848606, 58.278877],
              [21.84416, 58.285553],
              [21.841385, 58.29305],
              [21.843887, 58.299164],
              [21.874439, 58.339989],
              [21.885273, 58.343323],
              [21.899162, 58.342766],
              [21.955551, 58.34305],
              [22.0075, 58.35332],
              [22.006386, 58.359993],
              [21.99638, 58.381378],
              [21.916664, 58.4575],
              [21.910275, 58.463051],
              [21.901939, 58.468048],
              [21.878052, 58.474159],
              [21.867775, 58.478325],
              [21.85139, 58.48777],
              [21.83194, 58.504997],
              [21.842773, 58.508331],
              [21.924995, 58.517212],
              [21.98472, 58.516388],
              [22.000553, 58.514999],
              [22.112495, 58.492218],
              [22.189163, 58.544998],
              [22.19833, 58.549438],
              [22.327221, 58.577492],
              [22.501663, 58.602219],
              [22.62416, 58.593323],
              [22.76833, 58.60027],
              [22.775761, 58.606155],
              [22.807774, 58.616386],
              [22.82361, 58.616936],
              [22.871662, 58.617767],
              [22.905273, 58.617493],
              [22.917217, 58.616104],
              [22.978882, 58.601105],
              [22.990829, 58.597771]
            ]
          ],
          [
            [
              [23.364998, 58.529991],
              [23.227219, 58.529716],
              [23.215271, 58.53305],
              [23.091106, 58.580276],
              [23.07111, 58.588326],
              [23.06472, 58.594154],
              [23.060276, 58.60083],
              [23.057774, 58.60833],
              [23.060829, 58.616386],
              [23.06861, 58.621658],
              [23.140274, 58.665825],
              [23.149719, 58.670273],
              [23.173607, 58.675827],
              [23.186382, 58.678047],
              [23.200829, 58.67916],
              [23.216385, 58.677773],
              [23.247459, 58.671051],
              [23.271385, 58.664436],
              [23.317219, 58.650826],
              [23.339165, 58.643326],
              [23.347218, 58.638603],
              [23.394997, 58.565544],
              [23.399162, 58.558884],
              [23.396385, 58.550827],
              [23.376106, 58.53305],
              [23.364998, 58.529991]
            ]
          ],
          [
            [
              [23.277222, 58.963051],
              [23.18055, 58.9611],
              [23.16472, 58.962769],
              [23.152496, 58.965828],
              [23.14444, 58.970825],
              [23.13805, 58.976654],
              [23.113331, 59.01721],
              [23.110828, 59.024712],
              [23.117218, 59.030823],
              [23.12666, 59.034996],
              [23.137775, 59.03833],
              [23.15083, 59.04055],
              [23.181385, 59.042221],
              [23.19216, 59.041985],
              [23.325829, 59.037498],
              [23.339718, 59.035271],
              [23.35194, 59.031937],
              [23.361942, 59.027771],
              [23.370274, 59.023048],
              [23.38722, 59.00471],
              [23.391663, 58.99805],
              [23.39222, 58.989716],
              [23.387497, 58.98276],
              [23.381107, 58.976379],
              [23.369995, 58.973045],
              [23.291943, 58.964157],
              [23.277222, 58.963051]
            ]
          ],
          [
            [
              [22.749718, 59],
              [22.801109, 58.997215],
              [22.843052, 59.00222],
              [22.860828, 59.001663],
              [22.929718, 58.98249],
              [22.952496, 58.96693],
              [23.04361, 58.851105],
              [23.04805, 58.844437],
              [23.045277, 58.83638],
              [23.021664, 58.820549],
              [23.005276, 58.830551],
              [22.960827, 58.84499],
              [22.94833, 58.844437],
              [22.88444, 58.833054],
              [22.865551, 58.82444],
              [22.868328, 58.818886],
              [22.882217, 58.816666],
              [22.888607, 58.810822],
              [22.887218, 58.787773],
              [22.88444, 58.779716],
              [22.848053, 58.7736],
              [22.81583, 58.772766],
              [22.798332, 58.7736],
              [22.784443, 58.775826],
              [22.77805, 58.781662],
              [22.77722, 58.78999],
              [22.783333, 58.796104],
              [22.792774, 58.80027],
              [22.803886, 58.803604],
              [22.823051, 58.81221],
              [22.829163, 58.818329],
              [22.826385, 58.824165],
              [22.812496, 58.82638],
              [22.79805, 58.824997],
              [22.77583, 58.818604],
              [22.74721, 58.80555],
              [22.739437, 58.80027],
              [22.721107, 58.781662],
              [22.70138, 58.753883],
              [22.692493, 58.739433],
              [22.68972, 58.731102],
              [22.680828, 58.71666],
              [22.674717, 58.710548],
              [22.666939, 58.705269],
              [22.646385, 58.697769],
              [22.62416, 58.691101],
              [22.59555, 58.68832],
              [22.56527, 58.686653],
              [22.5475, 58.68721],
              [22.53167, 58.688599],
              [22.517776, 58.691101],
              [22.479996, 58.69971],
              [22.469715, 58.703606],
              [22.465271, 58.710274],
              [22.46944, 58.715546],
              [22.47194, 58.76361],
              [22.449997, 58.831383],
              [22.445549, 58.838043],
              [22.426105, 58.85527],
              [22.404995, 58.871658],
              [22.390274, 58.88221],
              [22.381939, 58.88694],
              [22.369717, 58.890274],
              [22.336109, 58.89222],
              [22.276943, 58.88943],
              [22.24555, 58.878601],
              [22.229439, 58.87804],
              [22.177219, 58.888885],
              [22.164997, 58.891937],
              [22.06361, 58.923607],
              [22.05333, 58.927773],
              [22.044998, 58.932495],
              [22.04222, 58.939987],
              [22.046387, 58.945267],
              [22.052219, 58.949715],
              [22.064999, 58.952217],
              [22.191105, 58.947487],
              [22.375553, 58.95166],
              [22.434441, 58.966385],
              [22.468052, 58.978043],
              [22.487774, 58.992218],
              [22.523609, 59.022491],
              [22.575829, 59.068604],
              [22.699162, 59.051384],
              [22.694717, 59.044159],
              [22.6986, 59.019989],
              [22.70305, 59.013611],
              [22.719715, 59.003609],
              [22.733883, 59.001389],
              [22.749718, 59]
            ]
          ],
          [
            [
              [25.780277, 59.628876],
              [25.873051, 59.598877],
              [25.979996, 59.632767],
              [26.03083, 59.622765],
              [26.04361, 59.619987],
              [26.078053, 59.600548],
              [26.263054, 59.585823],
              [26.389717, 59.561661],
              [26.458328, 59.541107],
              [26.479996, 59.533882],
              [26.496105, 59.53277],
              [26.525276, 59.536385],
              [26.538052, 59.539162],
              [26.561665, 59.545273],
              [26.572498, 59.54916],
              [26.578053, 59.55555],
              [26.58889, 59.55916],
              [26.621662, 59.557213],
              [26.650551, 59.553322],
              [26.675827, 59.547493],
              [26.736938, 59.522491],
              [26.772774, 59.503883],
              [26.817219, 59.48082],
              [26.84972, 59.469437],
              [26.860275, 59.46583],
              [26.883606, 59.45916],
              [26.921383, 59.450829],
              [26.964718, 59.444992],
              [26.98083, 59.44388],
              [27.033333, 59.44249],
              [27.0875, 59.442215],
              [27.185272, 59.446938],
              [27.391106, 59.448601],
              [27.427219, 59.44833],
              [27.443607, 59.44721],
              [27.45805, 59.445267],
              [27.483051, 59.43943],
              [27.509998, 59.434433],
              [27.553051, 59.428604],
              [27.848053, 59.406654],
              [27.88055, 59.407768],
              [27.895275, 59.409431],
              [27.933331, 59.41721],
              [27.953884, 59.42527],
              [27.97805, 59.440544],
              [27.99305, 59.451385],
              [27.998882, 59.457771],
              [28.015831, 59.4786],
              [28.026386, 59.47499],
              [28.07611, 59.453323],
              [28.10944, 59.436104],
              [28.170273, 59.397774],
              [28.180828, 59.389435],
              [28.193886, 59.375824],
              [28.195274, 59.369438],
              [28.19361, 59.363327],
              [28.179321, 59.328236],
              [28.170359, 59.30978],
              [28.158232, 59.297653],
              [28.143995, 59.290802],
              [28.09549, 59.283947],
              [28.055418, 59.279202],
              [28.030111, 59.277092],
              [28.01113, 59.279728],
              [27.99584, 59.284473],
              [27.97106, 59.287109],
              [27.951551, 59.28553],
              [27.920444, 59.275509],
              [27.912537, 59.27182],
              [27.879847, 59.22806],
              [27.837219, 59.150826],
              [27.810555, 59.102493],
              [27.803329, 59.085266],
              [27.792221, 59.063324],
              [27.788052, 59.058601],
              [27.704994, 58.98582],
              [27.689438, 58.97943],
              [27.596943, 58.931381],
              [27.549999, 58.907768],
              [27.533886, 58.902214],
              [27.493607, 58.881935],
              [27.457218, 58.85249],
              [27.43944, 58.83416],
              [27.435551, 58.829437],
              [27.428608, 58.81916],
              [27.426105, 58.813606],
              [27.42305, 58.80138],
              [27.421661, 58.78833],
              [27.421661, 58.78138],
              [27.451107, 58.686935],
              [27.488049, 58.576385],
              [27.490551, 58.570831],
              [27.495827, 58.55999],
              [27.500832, 58.548882],
              [27.517498, 58.50972],
              [27.521385, 58.498329],
              [27.535275, 58.450829],
              [27.542496, 58.413879],
              [27.54361, 58.393883],
              [27.543331, 58.373322],
              [27.541943, 58.36721],
              [27.539165, 58.361664],
              [27.534996, 58.356941],
              [27.525829, 58.348045],
              [27.514999, 58.339989],
              [27.496662, 58.32888],
              [27.485828, 58.320831],
              [27.467216, 58.303047],
              [27.464718, 58.297775],
              [27.464439, 58.283882],
              [27.47166, 58.226379],
              [27.474163, 58.213882],
              [27.476662, 58.208603],
              [27.48055, 58.203606],
              [27.54888, 58.13694],
              [27.554165, 58.132767],
              [27.56583, 58.125267],
              [27.58, 58.11916],
              [27.60194, 58.109993],
              [27.60972, 58.107216],
              [27.625275, 58.101662],
              [27.641106, 58.0961],
              [27.65, 58.094154],
              [27.663052, 58.087212],
              [27.673328, 58.07888],
              [27.677219, 58.074165],
              [27.680828, 58.062492],
              [27.686661, 57.965271],
              [27.77333, 57.902214],
              [27.784721, 57.89888],
              [27.805275, 57.891106],
              [27.809998, 57.888885],
              [27.817497, 57.88388],
              [27.820274, 57.881104],
              [27.823051, 57.873878],
              [27.822773, 57.869713],
              [27.82111, 57.865829],
              [27.813885, 57.860275],
              [27.785275, 57.84833],
              [27.753052, 57.839157],
              [27.734993, 57.835548],
              [27.702217, 57.831665],
              [27.673607, 57.830276],
              [27.629997, 57.828606],
              [27.577221, 57.82277],
              [27.55139, 57.819443],
              [27.54583, 57.817772],
              [27.40583, 57.68499],
              [27.400829, 57.678047],
              [27.348053, 57.595543],
              [27.34694, 57.5911],
              [27.34694, 57.586937],
              [27.348053, 57.583054],
              [27.353329, 57.568604],
              [27.361664, 57.547493],
              [27.363331, 57.54416],
              [27.372059, 57.535637],
              [27.31028, 57.53138],
              [27.08722, 57.56221],
              [27.080551, 57.563606],
              [27.07027, 57.567497],
              [27.051662, 57.588326],
              [27.03944, 57.599716],
              [27.03194, 57.604713],
              [27.01861, 57.611382],
              [26.996105, 57.61832],
              [26.96999, 57.62332],
              [26.906105, 57.633049],
              [26.898331, 57.633881],
              [26.883884, 57.633606],
              [26.873051, 57.630547],
              [26.69777, 57.575554],
              [26.63499, 57.555824],
              [26.626385, 57.551102],
              [26.619995, 57.544998],
              [26.615273, 57.533051],
              [26.612774, 57.529434],
              [26.60889, 57.526939],
              [26.602776, 57.525826],
              [26.53889, 57.522217],
              [26.523609, 57.523048],
              [26.51139, 57.5261],
              [26.313332, 57.605],
              [26.299164, 57.611382],
              [26.287498, 57.618881],
              [26.274166, 57.62971],
              [26.204441, 57.69499],
              [26.034996, 57.823326],
              [25.946941, 57.85388],
              [25.883053, 57.85583],
              [25.836384, 57.86055],
              [25.80139, 57.865829],
              [25.622772, 57.916382],
              [25.618053, 57.918327],
              [25.461105, 57.994438],
              [25.453327, 57.999435],
              [25.44944, 58.005829],
              [25.444996, 58.020828],
              [25.439995, 58.026939],
              [25.436108, 58.029434],
              [25.42166, 58.03555],
              [25.307499, 58.081383],
              [25.301662, 58.083054],
              [25.294998, 58.084435],
              [25.28722, 58.08416],
              [25.275555, 58.081665],
              [25.266941, 58.076942],
              [25.263054, 58.06916],
              [25.264442, 58.061378],
              [25.288887, 58.047218],
              [25.29472, 58.04138],
              [25.296944, 58.038048],
              [25.300274, 58.026939],
              [25.30055, 58.018883],
              [25.299999, 58.01416],
              [25.294441, 58.0075],
              [25.28583, 58.003052],
              [25.247215, 57.99249],
              [25.232494, 57.992767],
              [25.223885, 57.997215],
              [25.215, 58.005829],
              [25.210827, 58.012497],
              [25.207218, 58.028046],
              [25.203884, 58.03916],
              [25.199718, 58.049995],
              [25.192493, 58.059433],
              [25.179718, 58.070274],
              [25.169994, 58.07444],
              [25.163052, 58.07583],
              [25.139164, 58.07666],
              [25.124439, 58.076103],
              [25.09166, 58.071663],
              [25.07, 58.065269],
              [25.060829, 58.061104],
              [25.03833, 58.05027],
              [25.015831, 58.039436],
              [24.723885, 57.964996],
              [24.56055, 57.95555],
              [24.553608, 57.954712],
              [24.542774, 57.95166],
              [24.453049, 57.913322],
              [24.443329, 57.904434],
              [24.441105, 57.900826],
              [24.438328, 57.89277],
              [24.433884, 57.88583],
              [24.42777, 57.879433],
              [24.420273, 57.874435],
              [24.4025, 57.870544],
              [24.37305, 57.868881],
              [24.32444, 57.87027],
              [24.31498, 57.871826],
              [24.338051, 57.923882],
              [24.345829, 57.93943],
              [24.353886, 57.954712],
              [24.363052, 57.96888],
              [24.389996, 58.002777],
              [24.400829, 58.016106],
              [24.41194, 58.029434],
              [24.426105, 58.040833],
              [24.433884, 58.046104],
              [24.456661, 58.076103],
              [24.46999, 58.122765],
              [24.471661, 58.131935],
              [24.471107, 58.1486],
              [24.468884, 58.156097],
              [24.452496, 58.18277],
              [24.46944, 58.23916],
              [24.472771, 58.247215],
              [24.47916, 58.253326],
              [24.486938, 58.25861],
              [24.498051, 58.26166],
              [24.526665, 58.274162],
              [24.542496, 58.284439],
              [24.555275, 58.296944],
              [24.559998, 58.303879],
              [24.561665, 58.31305],
              [24.559441, 58.320549],
              [24.55555, 58.327217],
              [24.541386, 58.33804],
              [24.51778, 58.35305],
              [24.458885, 58.37833],
              [24.419716, 58.38666],
              [24.390553, 58.390831],
              [24.362495, 58.39194],
              [24.348331, 58.390831],
              [24.335552, 58.3886],
              [24.326107, 58.38472],
              [24.30055, 58.359993],
              [24.29583, 58.352776],
              [24.29305, 58.33638],
              [24.293331, 58.328049],
              [24.291943, 58.318886],
              [24.28722, 58.311661],
              [24.28083, 58.30555],
              [24.246105, 58.27666],
              [24.238049, 58.271378],
              [24.110554, 58.232208],
              [24.100552, 58.236382],
              [24.092773, 58.24138],
              [24.056664, 58.26777],
              [24.050552, 58.273605],
              [24.01083, 58.29861],
              [23.99305, 58.30777],
              [23.973328, 58.315826],
              [23.949718, 58.322495],
              [23.937775, 58.325829],
              [23.826385, 58.354713],
              [23.78167, 58.350273],
              [23.770832, 58.346939],
              [23.728607, 58.370827],
              [23.679161, 58.425552],
              [23.630829, 58.5236],
              [23.61694, 58.5261],
              [23.524719, 58.558327],
              [23.50111, 58.576942],
              [23.495548, 58.69415],
              [23.523331, 58.73555],
              [23.529442, 58.741661],
              [23.538887, 58.746101],
              [23.549442, 58.743881],
              [23.56944, 58.73555],
              [23.583332, 58.733047],
              [23.60083, 58.732491],
              [23.725552, 58.744713],
              [23.867496, 58.766388],
              [23.874996, 58.7686],
              [23.85722, 58.7786],
              [23.827221, 58.79111],
              [23.805275, 58.798607],
              [23.79139, 58.800827],
              [23.59166, 58.788048],
              [23.483051, 58.80999],
              [23.420273, 58.903877],
              [23.416107, 58.910545],
              [23.41555, 58.91888],
              [23.431107, 58.93943],
              [23.445549, 58.940544],
              [23.477219, 58.937492],
              [23.5075, 58.93721],
              [23.57694, 58.947212],
              [23.58833, 58.950546],
              [23.637775, 58.970543],
              [23.635551, 58.978043],
              [23.62833, 59.000549],
              [23.623329, 59.015549],
              [23.617218, 59.021378],
              [23.590553, 59.035271],
              [23.57222, 59.044159],
              [23.56028, 59.047493],
              [23.56472, 59.040833],
              [23.570831, 59.035271],
              [23.60139, 59.022766],
              [23.60944, 59.01777],
              [23.611942, 59.010277],
              [23.605553, 59.004166],
              [23.55638, 58.98777],
              [23.514164, 58.981102],
              [23.46638, 58.98416],
              [23.452496, 58.986382],
              [23.436108, 58.997215],
              [23.413609, 59.012772],
              [23.407219, 59.0186],
              [23.42833, 59.051933],
              [23.43305, 59.059158],
              [23.44083, 59.064438],
              [23.482494, 59.08943],
              [23.465549, 59.191376],
              [23.463051, 59.19887],
              [23.464161, 59.206383],
              [23.470551, 59.212494],
              [23.49972, 59.225266],
              [23.51083, 59.228325],
              [23.613609, 59.23972],
              [23.711384, 59.231102],
              [23.727219, 59.22971],
              [23.738605, 59.232765],
              [23.744995, 59.23916],
              [23.742493, 59.24638],
              [23.736382, 59.25222],
              [23.725552, 59.264717],
              [23.721382, 59.271378],
              [23.729439, 59.276657],
              [23.742218, 59.278603],
              [23.83083, 59.289719],
              [23.856941, 59.284164],
              [23.891106, 59.273323],
              [23.905273, 59.270828],
              [23.936108, 59.272217],
              [24.027222, 59.287773],
              [24.024166, 59.356102],
              [24.02, 59.36277],
              [24.019444, 59.371101],
              [24.022774, 59.379158],
              [24.029163, 59.38527],
              [24.03722, 59.390549],
              [24.050274, 59.392769],
              [24.064999, 59.393883],
              [24.08111, 59.39222],
              [24.105274, 59.385551],
              [24.12361, 59.37666],
              [24.148052, 59.361664],
              [24.176662, 59.348328],
              [24.186661, 59.344154],
              [24.19916, 59.342766],
              [24.212215, 59.344994],
              [24.318886, 59.425827],
              [24.325275, 59.431938],
              [24.32444, 59.45694],
              [24.329163, 59.464157],
              [24.339165, 59.468323],
              [24.350552, 59.471375],
              [24.363609, 59.473602],
              [24.394718, 59.47499],
              [24.41083, 59.47332],
              [24.536663, 59.457214],
              [24.72277, 59.452774],
              [24.791943, 59.51028],
              [24.779163, 59.520271],
              [24.776943, 59.527489],
              [24.771664, 59.557495],
              [24.776665, 59.564438],
              [24.79, 59.566666],
              [24.801941, 59.563324],
              [24.860554, 59.545547],
              [24.868607, 59.54055],
              [24.887218, 59.523048],
              [24.909439, 59.507217],
              [24.927494, 59.506386],
              [25.05055, 59.51194],
              [25.100552, 59.5261],
              [25.10722, 59.532211],
              [25.121941, 59.533333],
              [25.154442, 59.53166],
              [25.25833, 59.51416],
              [25.282776, 59.509163],
              [25.318886, 59.498878],
              [25.358887, 59.490547],
              [25.392494, 59.485825],
              [25.405926, 59.49064],
              [25.490829, 59.561104],
              [25.486938, 59.5686],
              [25.46944, 59.648331],
              [25.471107, 59.656654],
              [25.476383, 59.663048],
              [25.49277, 59.664154],
              [25.591663, 59.60388],
              [25.59916, 59.59833],
              [25.609997, 59.585548],
              [25.631939, 59.568886],
              [25.64277, 59.565269],
              [25.655552, 59.562767],
              [25.673885, 59.562767],
              [25.700829, 59.568329],
              [25.709995, 59.57277],
              [25.715271, 59.579437],
              [25.715271, 59.5886],
              [25.71333, 59.596657],
              [25.707771, 59.60305],
              [25.693329, 59.61416],
              [25.687775, 59.62054],
              [25.66916, 59.653603],
              [25.67472, 59.659988],
              [25.6836, 59.664711],
              [25.694439, 59.668327],
              [25.70916, 59.66666],
              [25.719994, 59.662766],
              [25.7675, 59.640831],
              [25.774719, 59.635551],
              [25.780277, 59.628876]
            ]
          ]
        ]
      }
    }
  ]
}
';
    }
}
