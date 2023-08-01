<?php
 
namespace Lwwcas\LaravelCountries\Database\Seeders\Countries;

use Illuminate\Database\Seeder;
use Lwwcas\LaravelCountries\Database\Seeders\Builder;

class KP_NorthKorea extends Seeder
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
    public $region = 'asia';
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->name = 'North Korea';
        $this->official_name = 'Democratic People\'s Republic of Korea';
        $this->iso_alpha_2 = 'KP';
        $this->iso_alpha_3 = 'PRK';
        $this->iso_numeric = '408';
        $this->international_phone = '850';
 
        $this->languages = ['ko'];
        $this->tld = ['.kp'];
        $this->wmo = 'KR';
        $this->geoname_id = '1873107';
 
        $this->emoji = [
            'img' => '🇰🇵',
            'uCode' => 'U+1F1F0 U+1F1F5',
        ];
        $this->color = [
            'hex' => [
                '#ff0000',
                '#ffffff',
                '#0000ff',
            ],
            'rgb' => [
                '255,0,0',
                '255,255,255',
                '0,0,255',
            ],
        ];
        $this->coordinates = [
            'latitude' => [
                'classic' => '40 00 N',
                'desc' => '40.077640533447266',
            ],
            'longitude' => [
                'classic' => '127 00 E',
                'desc' => '127.13385009765625',
            ],
        ];
        $this->coordinates_limit = [
            'latitude' => [
                'max' => '43.003889',
                'min' => '37.6775',
            ],
            'longitude' => [
                'max' => '130.672222',
                'min' => '124.1875',
            ],
        ];
 
        $this->geographical = json_decode($this->geographical(), true);
 
        Builder::country($this);
    }
 
    public function geographical()
    {
        return '{"type":"FeatureCollection","features":[{"type":"Feature","properties":{"cca2":"kp"},"geometry":{"type":"MultiPolygon","coordinates":[[[[124.8461,39.497215],[124.839981,39.49554],[124.83194,39.496101],[124.831673,39.501663],[124.849716,39.549995],[124.881927,39.5961],[124.88916,39.605553],[124.893883,39.608887],[124.905823,39.61277],[124.912491,39.61388],[124.928589,39.611382],[124.934143,39.60833],[124.935532,39.60332],[124.923599,39.557495],[124.921921,39.55222],[124.906372,39.534721],[124.877762,39.513611],[124.868042,39.5075],[124.857208,39.501938],[124.8461,39.497215]]],[[[130.638885,42.406937],[130.654694,42.386108],[130.659149,42.37666],[130.661102,42.371933],[130.661102,42.366386],[130.652771,42.339989],[130.650818,42.32888],[130.650543,42.323326],[130.654968,42.313881],[130.663879,42.30638],[130.697418,42.292206],[130.688873,42.283882],[130.678589,42.277214],[130.673035,42.274712],[130.604675,42.253609],[130.596924,42.253609],[130.592468,42.2575],[130.593842,42.263611],[130.598572,42.276939],[130.598572,42.282768],[130.594116,42.292221],[130.587463,42.300545],[130.583038,42.304161],[130.578033,42.30666],[130.570251,42.30888],[130.500275,42.323883],[130.476349,42.324997],[130.469421,42.324165],[130.420807,42.311935],[130.208313,42.16777],[130.087738,42.06972],[129.986359,41.982033],[129.981903,41.977859],[129.949707,41.883873],[129.855225,41.76111],[129.8508,41.75694],[129.845245,41.75444],[129.837738,41.75444],[129.813019,41.760551],[129.804688,41.761383],[129.784973,41.757217],[129.779419,41.75471],[129.760529,41.730545],[129.699402,41.648605],[129.69635,41.64277],[129.690521,41.631104],[129.68692,41.62027],[129.664154,41.549721],[129.660522,41.531105],[129.660522,41.525269],[129.666077,41.482208],[129.667206,41.476936],[129.673859,41.462769],[129.679413,41.45388],[129.689423,41.441376],[129.703033,41.430275],[129.721893,41.42166],[129.753326,41.407211],[129.800262,41.380272],[129.805817,41.376938],[129.808014,41.372215],[129.789429,41.32888],[129.786652,41.322769],[129.769714,41.30027],[129.720795,41.183876],[129.718567,41.177216],[129.715515,41.142769],[129.713867,41.112213],[129.718018,41.012215],[129.719116,40.995544],[129.720245,40.984718],[129.7258,40.975548],[129.739136,40.95888],[129.743561,40.955269],[129.753601,40.94249],[129.755829,40.937767],[129.755829,40.931938],[129.728851,40.86277],[129.7258,40.856941],[129.709412,40.829994],[129.702454,40.829163],[129.68692,40.833603],[129.664154,40.833603],[129.608307,40.828049],[129.594696,40.826385],[129.567749,40.82194],[129.561371,40.820549],[129.229126,40.690269],[129.213867,40.681107],[129.210236,40.675827],[129.207458,40.66999],[129.17276,40.592216],[129.168304,40.57888],[129.171082,40.56562],[129.171631,40.563049],[129.168854,40.557213],[129.159424,40.54055],[129.152466,40.530273],[129.112732,40.482765],[129.10553,40.474709],[129.100525,40.471375],[129.084137,40.463882],[129.071625,40.460548],[129.064148,40.460548],[129.046936,40.462769],[128.98053,40.45166],[128.974976,40.449158],[128.941925,40.424713],[128.924408,40.4086],[128.916077,40.400269],[128.911926,40.395828],[128.904968,40.385826],[128.900818,40.38166],[128.886383,40.371376],[128.876068,40.36555],[128.870514,40.363052],[128.812195,40.34166],[128.794128,40.335548],[128.788025,40.333878],[128.636658,40.272766],[128.598022,40.174164],[128.332458,40.053604],[128.184143,40.0236],[128.141083,40.022766],[128.111908,40.027214],[128.055237,40.033882],[128.001373,40.037216],[127.933594,39.971657],[127.887207,39.917213],[127.886383,39.911102],[127.882202,39.897491],[127.874687,39.888046],[127.863403,39.88385],[127.727203,39.8461],[127.623596,39.816101],[127.617477,39.814156],[127.611923,39.811661],[127.596367,39.803047],[127.560532,39.782211],[127.521378,39.74416],[127.513893,39.73499],[127.506943,39.724709],[127.503883,39.719437],[127.501663,39.712769],[127.5,39.694435],[127.50444,39.644714],[127.529427,39.464714],[127.531937,39.448601],[127.535812,39.427216],[127.556641,39.327217],[127.561371,39.317772],[127.562477,39.312492],[127.561653,39.306381],[127.558319,39.301384],[127.553589,39.297775],[127.539429,39.29666],[127.531662,39.298882],[127.522774,39.306099],[127.51944,39.310272],[127.522491,39.339714],[127.526093,39.344711],[127.534714,39.352493],[127.537773,39.365547],[127.532761,39.386383],[127.530548,39.39111],[127.506943,39.423882],[127.502487,39.42749],[127.49498,39.429436],[127.486923,39.430275],[127.474152,39.42749],[127.457207,39.420547],[127.45166,39.41777],[127.44693,39.414436],[127.438751,39.404945],[127.411102,39.39222],[127.374687,39.37221],[127.374687,39.244713],[127.375809,39.233047],[127.380539,39.218048],[127.393051,39.200829],[127.406372,39.18971],[127.443588,39.16694],[127.449142,39.163605],[127.454712,39.160545],[127.536377,39.141106],[127.545258,39.139435],[127.645538,39.124992],[127.782761,39.088326],[127.809708,39.049164],[127.854156,38.98943],[127.857483,38.98527],[127.880257,38.962769],[128.008026,38.859993],[128.013611,38.856941],[128.038025,38.852493],[128.061096,38.84749],[128.068848,38.84527],[128.093842,38.83443],[128.122192,38.81916],[128.136658,38.802773],[128.201355,38.735268],[128.226624,38.73333],[128.260529,38.736938],[128.266663,38.738884],[128.293304,38.727486],[128.337189,38.702217],[128.358856,38.683601],[128.362183,38.679436],[128.36441,38.674713],[128.365509,38.669716],[128.363556,38.625244],[128.32135,38.599159],[128.30719,38.588882],[128.303589,38.583878],[128.30191,38.578331],[128.305542,38.562767],[128.307739,38.558044],[128.313599,38.531937],[128.313599,38.520546],[128.312744,38.51416],[128.307739,38.488602],[128.301361,38.468323],[128.293304,38.450546],[128.279694,38.430275],[128.260529,38.411659],[128.243561,38.395271],[128.224976,38.38166],[128.200806,38.365547],[128.176086,38.349998],[128.166077,38.34388],[128.150818,38.335266],[128.139984,38.330276],[128.134155,38.328331],[128.079956,38.311935],[128.054688,38.306656],[128.010529,38.30555],[127.988037,38.3061],[127.971367,38.308327],[127.885269,38.313606],[127.676086,38.320274],[127.661926,38.31916],[127.537491,38.307495],[127.450821,38.312492],[127.366379,38.323326],[127.251389,38.31889],[127.197479,38.311935],[127.133881,38.299164],[127.127762,38.297218],[127.106087,38.287498],[127.095833,38.280823],[127.068047,38.259995],[127.058029,38.253883],[127.042213,38.246101],[127.005798,38.22924],[126.99054,38.218048],[126.982758,38.209435],[126.972763,38.19415],[126.966927,38.183052],[126.955109,38.154449],[126.935257,38.128601],[126.824432,38.01611],[126.807213,38.00055],[126.780273,37.978874],[126.766663,37.968323],[126.745529,37.957771],[126.727768,37.952492],[126.688492,37.833908],[126.624687,37.788605],[126.587486,37.770828],[126.580551,37.771935],[126.573883,37.77444],[126.479156,37.82027],[126.426651,37.852219],[126.418053,37.859436],[126.414703,37.863609],[126.399803,37.88599],[126.392212,37.887215],[126.384987,37.887215],[126.353317,37.880547],[126.214157,37.847214],[126.202209,37.843605],[126.1436,37.82361],[126.142212,37.818329],[126.144707,37.80777],[126.158867,37.779716],[126.161377,37.763611],[126.160812,37.751663],[126.157211,37.73804],[126.15332,37.733604],[126.146652,37.732765],[126.140549,37.73305],[126.108032,37.73999],[126.101646,37.742493],[126.066383,37.794716],[126.042763,37.863609],[125.97554,37.905548],[125.967758,37.90638],[125.961113,37.905266],[125.945251,37.897217],[125.94136,37.892769],[125.94165,37.887215],[125.944977,37.883049],[125.969147,37.871933],[125.973602,37.868324],[125.976929,37.864159],[125.985809,37.833328],[125.986099,37.827774],[125.982758,37.822495],[125.925537,37.83416],[125.918053,37.83638],[125.911377,37.838882],[125.824432,37.941101],[125.806931,37.982491],[125.803307,37.986656],[125.79776,37.98972],[125.752213,38.001663],[125.744713,38.00361],[125.672493,38.01694],[125.605263,38.0261],[125.589157,38.027214],[125.573608,38.019157],[125.57222,38.01361],[125.573608,38.008606],[125.590271,37.993607],[125.594711,37.98999],[125.604713,37.98333],[125.621368,37.974159],[125.641937,37.967209],[125.650543,37.965828],[125.724426,37.91082],[125.643051,37.818886],[125.57193,37.778877],[125.56192,37.785553],[125.555817,37.785828],[125.521103,37.784439],[125.383041,37.710548],[125.378311,37.70694],[125.342758,37.671379],[125.337196,37.680275],[125.332207,37.713051],[125.334717,37.719154],[125.380547,37.789772],[125.387207,37.794998],[125.434982,37.81638],[125.452766,37.82194],[125.487488,37.837494],[125.514999,37.87638],[125.515823,37.882767],[125.512207,37.88694],[125.495819,37.896103],[125.4561,37.912491],[125.426376,37.906654],[125.387497,37.896103],[125.354713,37.86388],[125.350807,37.859436],[125.308594,37.886383],[125.252487,37.930275],[125.243591,37.931664],[125.233871,37.925552],[125.22998,37.921104],[125.224426,37.895828],[125.218048,37.885269],[125.209152,37.87833],[125.194138,37.869438],[125.176933,37.86277],[125.170532,37.861938],[125.162491,37.862495],[125.132477,37.86805],[125.094711,37.875549],[125.078598,37.878876],[125.029984,37.892494],[125.015823,37.89694],[125.010269,37.899994],[124.980553,37.924438],[124.98027,37.930275],[124.981934,37.93721],[124.987488,37.948326],[124.991364,37.95277],[125.114433,38.041664],[125.120529,38.043327],[125.185257,38.046387],[125.200546,38.046104],[125.211647,38.039993],[125.214996,38.035828],[125.217484,38.03138],[125.219994,38.020828],[125.223602,38.016663],[125.22998,38.01416],[125.238876,38.01277],[125.246094,38.013054],[125.251389,38.015831],[125.27388,38.06055],[125.274986,38.064713],[125.272491,38.06916],[125.268051,38.072769],[125.262497,38.075829],[125.256104,38.078331],[125.240807,38.082214],[125.133041,38.091103],[125.106644,38.086937],[125.083054,38.07944],[125.066673,38.07194],[125.054703,38.068329],[125.02916,38.063049],[125.014427,38.062767],[124.870819,38.104713],[124.859154,38.101105],[124.788879,38.095268],[124.766937,38.096657],[124.680542,38.111664],[124.673866,38.11416],[124.664703,38.121101],[124.661102,38.131104],[124.664703,38.13555],[124.669983,38.138046],[124.681931,38.141937],[124.688583,38.143051],[124.721649,38.13916],[124.736366,38.139717],[124.751938,38.148048],[124.821381,38.188881],[124.862488,38.22916],[124.868317,38.25222],[124.867477,38.26944],[124.86554,38.3325],[124.958328,38.463326],[124.9897,38.583878],[124.993591,38.588326],[125.000267,38.58943],[125.051933,38.58194],[125.058594,38.579437],[125.156647,38.644714],[125.300537,38.652771],[125.31749,38.650543],[125.3461,38.670273],[125.37442,38.690544],[125.3797,38.693047],[125.447197,38.700546],[125.549988,38.67666],[125.555817,38.673607],[125.560257,38.66999],[125.576393,38.64888],[125.589706,38.638329],[125.595261,38.635269],[125.621643,38.625267],[125.629433,38.623047],[125.646103,38.621101],[125.652206,38.623047],[125.652588,38.624512],[125.65332,38.627213],[125.650818,38.63166],[125.63472,38.652771],[125.631363,38.65694],[125.630547,38.657761],[125.629791,38.65694],[125.517212,38.71777],[125.479156,38.721657],[125.432213,38.72221],[125.367752,38.707214],[125.288307,38.695824],[125.284714,38.695824],[125.271652,38.700829],[125.244713,38.716385],[125.143883,38.786659],[125.139977,38.796387],[125.138893,38.801659],[125.139427,38.80777],[125.146942,38.863609],[125.151932,38.875549],[125.199707,38.921936],[125.235809,38.999161],[125.259163,39.052216],[125.284149,39.115547],[125.290268,39.15527],[125.339706,39.203323],[125.359421,39.21583],[125.388321,39.23749],[125.411652,39.279716],[125.421921,39.30804],[125.401657,39.35889],[125.362762,39.39194],[125.357208,39.394997],[125.338043,39.429993],[125.337769,39.435822],[125.338593,39.44221],[125.343597,39.454163],[125.349991,39.464439],[125.399429,39.5211],[125.407211,39.529716],[125.450439,39.572357],[125.448318,39.576385],[125.44165,39.57888],[125.429703,39.57527],[125.372757,39.55222],[125.311371,39.52583],[125.294144,39.51944],[125.286652,39.519157],[125.123032,39.557213],[125.117477,39.560272],[125.037491,39.605553],[124.945534,39.662491],[124.8461,39.72137],[124.752213,39.774994],[124.744431,39.776939],[124.738312,39.774994],[124.73526,39.769714],[124.735527,39.76416],[124.746368,39.714157],[124.754707,39.681664],[124.756943,39.677216],[124.756378,39.67083],[124.746933,39.635551],[124.743874,39.630272],[124.739151,39.626656],[124.733322,39.62471],[124.64415,39.596657],[124.638046,39.594994],[124.632202,39.59444],[124.624153,39.594994],[124.616089,39.613052],[124.629433,39.647217],[124.632751,39.652489],[124.649147,39.669159],[124.651657,39.68221],[124.650269,39.68721],[124.561653,39.799995],[124.536377,39.809715],[124.498871,39.821106],[124.44664,39.82972],[124.43248,39.828331],[124.406372,39.831665],[124.363602,39.864998],[124.322769,39.911377],[124.323608,39.91777],[124.32666,39.92305],[124.38443,40.01416],[124.392761,40.02193],[124.392761,40.039719],[124.373596,40.09362],[124.381363,40.102219],[124.410812,40.13027],[124.554703,40.242218],[124.620819,40.281662],[124.633041,40.285553],[124.679703,40.293884],[124.697746,40.29972],[124.708443,40.305046],[124.713547,40.308975],[124.812477,40.39666],[124.876648,40.466103],[124.880539,40.470543],[124.891373,40.475822],[124.898331,40.476936],[124.90416,40.475266],[124.962196,40.45916],[125.033867,40.455269],[125.039978,40.457214],[125.04332,40.462212],[125.042763,40.468048],[125.02832,40.48999],[125.021103,40.49833],[125.042763,40.537498],[125.140549,40.585266],[125.286102,40.647491],[125.314987,40.649994],[125.369141,40.639992],[125.412689,40.653801],[125.457489,40.703323],[125.55304,40.741379],[125.603867,40.755829],[125.651093,40.794998],[125.646378,40.798607],[125.645264,40.803879],[125.649719,40.816666],[125.653053,40.821663],[125.683868,40.848602],[125.688583,40.852219],[125.698029,40.85916],[125.70311,40.85997],[125.921921,40.879158],[125.928864,40.876656],[125.936371,40.876938],[125.943039,40.877769],[126.006653,40.893883],[126.016937,40.899994],[126.124687,41.034721],[126.27916,41.152771],[126.282494,41.158043],[126.286377,41.171661],[126.285812,41.175827],[126.290268,41.18499],[126.309982,41.214439],[126.36499,41.273605],[126.368874,41.277771],[126.411102,41.31916],[126.437759,41.342491],[126.4561,41.357216],[126.478867,41.366936],[126.485809,41.367767],[126.492477,41.365273],[126.510269,41.389992],[126.584427,41.568604],[126.58194,41.573051],[126.568047,41.589714],[126.563026,41.598877],[126.563347,41.610916],[126.566559,41.616974],[126.571381,41.62027],[126.645538,41.66054],[126.712769,41.691101],[126.795532,41.708046],[126.842758,41.73276],[126.853043,41.738884],[126.863312,41.754166],[126.87442,41.7686],[126.896378,41.78833],[126.91304,41.796104],[126.919144,41.79777],[126.936096,41.79444],[127.048027,41.708328],[127.060806,41.691101],[127.057037,41.643501],[127.100807,41.621376],[127.134987,41.593605],[127.159416,41.529991],[127.270828,41.472488],[127.620819,41.418053],[127.694153,41.413132],[127.835274,41.409988],[127.871094,41.424164],[127.92276,41.447212],[127.929703,41.44804],[127.93692,41.446938],[128.011658,41.415825],[128.044128,41.389435],[128.106628,41.371376],[128.112732,41.369713],[128.131348,41.37471],[128.149994,41.37999],[128.155823,41.382492],[128.185516,41.402214],[128.195251,41.408882],[128.204407,41.416664],[128.222473,41.441101],[128.282196,41.530273],[128.302185,41.57222],[128.30191,41.577774],[128.299713,41.588326],[128.297211,41.593048],[128.26944,41.63694],[128.262756,41.645271],[128.245789,41.655548],[128.226624,41.663879],[128.203857,41.676384],[128.160797,41.708328],[128.150543,41.720825],[128.101898,41.796104],[128.094971,41.80999],[128.068848,41.884995],[128.060791,41.910545],[128.049988,41.974991],[128.050232,41.988297],[128.054413,41.999161],[128.058868,42.003326],[128.268585,42.037498],[128.282471,42.03916],[128.33609,42.039719],[128.361359,42.037498],[128.422485,42.028603],[128.436096,42.023323],[128.44635,42.016663],[128.45163,42.006958],[128.452759,42.004166],[128.464691,41.999161],[128.481079,41.996101],[128.48941,41.995544],[128.5047,41.995544],[128.570251,42.000275],[128.675812,42.018326],[128.681915,42.019989],[128.698853,42.027489],[128.844971,42.02972],[128.895538,42.022766],[128.912201,42.0211],[128.925812,42.02444],[128.930542,42.027771],[128.939148,42.03611],[128.94635,42.046104],[128.952179,42.058044],[128.952179,42.069443],[128.954132,42.076103],[128.957733,42.081108],[128.968292,42.08694],[129.014099,42.094193],[129.016693,42.094994],[129.11441,42.139435],[129.152466,42.168053],[129.210236,42.217209],[129.213287,42.223045],[129.21109,42.22777],[129.209412,42.265831],[129.246063,42.375824],[129.341919,42.445824],[129.356628,42.446655],[129.4422,42.434433],[129.448029,42.431107],[129.514709,42.38694],[129.695526,42.435822],[129.711914,42.444153],[129.721344,42.46082],[129.727448,42.472763],[129.729126,42.478043],[129.733856,42.51416],[129.731903,42.530273],[129.727173,42.539719],[129.723846,42.555267],[129.751099,42.704712],[129.753326,42.716385],[129.757751,42.729713],[129.807465,42.853607],[129.847046,42.942482],[129.87558,42.989708],[129.879761,42.993874],[129.901642,43.003319],[129.907532,43.00582],[129.921234,43.008324],[129.937195,43.003876],[129.943085,43.000824],[129.952026,42.989983],[130.034149,42.958046],[130.184143,42.908325],[130.202179,42.904991],[130.245514,42.895271],[130.252197,42.892494],[130.259155,42.884163],[130.260254,42.879158],[130.257751,42.866661],[130.250275,42.831665],[130.243286,42.811661],[130.236359,42.789436],[130.236084,42.783051],[130.243286,42.718323],[130.250275,42.709991],[130.323303,42.645271],[130.333588,42.63833],[130.376617,42.617493],[130.51416,42.568054],[130.522491,42.537216],[130.567474,42.44305],[130.574127,42.434433],[130.584137,42.42749],[130.589966,42.424438],[130.597748,42.422218],[130.60437,42.42186],[130.628845,42.413879],[130.63443,42.41082],[130.638885,42.406937]]]]}}]}';
    }
}
