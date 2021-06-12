<?php

namespace Bagisto\Currencies\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Webkul\Core\Repositories\CurrencyRepository;

class CurrenciesController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CurrencyRepository object
     *
     * @var \Webkul\Core\Repositories\CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->middleware('admin');

        $this->_config = request('_config');

        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display all available currencies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data["currencies"] = json_decode(file_get_contents('currencies.json', true), true);
        return view($this->_config['view'], $data);
    }

    /**
     * Store a new currency to the database.
     *
     */
    public function store(Request $request)
    {
        $currencies = json_decode(file_get_contents('currencies.json', true), true);

        foreach($request->input('currency_id') as $item){
            foreach ($currencies as $obj) {
                if ($item ==  $obj["code"]) {
                    $save = $this->currencyRepository->firstOrCreate(['code' => $obj['code'], 'name' => $obj['name'], 'symbol' => $obj['symbol']]);
                    if ($save) {
                        session()->flash('success', 'Import has completed');
                    }
                }
            }
        }
    }
}
