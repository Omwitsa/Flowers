<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\PriceHeader;
use App\Models\PackRateHeader;
use App\Models\PriceLine;
use App\Models\PackRateLine;
use App\Models\Brand;
use App\Models\MixBoxLine;
use stdclass;
use Illuminate\Support\Facades\DB;

class MixedBox extends Component
{
    public $brands = 'AAA ROSES';
    public $varietyRange = '';
    public $client;
    public $price;
    public $packRate;
    public $length = 'len60';
    public $mixedBoxes;

    public $order_lines;
    
    public function mount()
    {
        // $this->varieties= DB::select('SELECT * FROM variety WHERE brand = ? AND v_range = ?', [$this->brands, $this->range]);
        $this->client = Client::firstWhere('ClientCode', auth()->user()->usercode);
        $this->price = PriceHeader::firstWhere('Name', $this->client->Price);
        $this->packRate = PackRateHeader::firstWhere('Name', $this->client->PackRate);
        $this->ranges = DB::select('SELECT * FROM variety_ranges WHERE brand = ?', [$this->brands]);
        // $this->varieties= DB::select('SELECT * FROM variety WHERE brand = ?', [$this->brands]);

        $this->formatvariety();
    }

    public function updatedBrands()
    {
        $this->formatvariety();
    }

    public function updatedQuantity()
    {
        $this->varietyRange = '';
    }

    private function formatvariety()
    {
        $this->mixedBoxes = DB::select('SELECT * FROM mix_boxes WHERE brand = ?', [$this->brands]);
        foreach ($this->mixedBoxes as $mixedBox) {
            $totalStems = 0;
            $mixBoxLines = DB::select('SELECT * FROM mix_box_lines WHERE mix_box_id = ?', [$mixedBox->id]);
            foreach ($mixBoxLines as $mixBoxLine){
                $totalStems += $mixBoxLine->stems;
            }
            $mixedBox->mixBoxLines = $mixBoxLines;
            $mixedBox->totalStems = $totalStems;
        }

        // dd($this->mixedBoxes);
    }

    public function onEnterQuantity($gv_index, $v_index, $value)
    {
        $variety = $this->groupedVarieties[$gv_index]->varieties[$v_index];
        $variety->stems = $variety->packrate * $value;
        $variety->sub_total = $variety->price * $value;
        // dd($value);
        //$this->varietyRange = $itemId;
        // Access the selected item data using $itemId (e.g., database query)
        // $selectedItem = Item::find($itemId);

        // Update component state, perform actions, etc. based on $selectedItem
        // $this->selectedItemId = $itemId; // Example: store the ID for further use
    }

    public function addToCart($gv_index, $v_index)
    {
        // $this->order_lines->dd();
        $variety = $this->groupedVarieties[$gv_index]->varieties[$v_index];
        // $order_lines = collect([$variety->FlowerType,$variety->brand, $variety->varietyRange, $variety->currency, $variety->price,$variety->sub_total]);
        $selectedBrand = Brand::firstWhere('name', $variety->brand);
        if(is_null($this->order_lines)){
            $this->order_lines = collect([
                ['VarietyId' => $variety->id, 'VarietyRangeId' => $variety->VarietyRangeId, 'Length' => substr($this->length,3), 'BoxType' => $this->packRate->id, 'StemQty' => $variety->stems, 'PackRate' => $variety->packrate, 'Boxes' => $variety->quantity, 'Farm' => $selectedBrand->farm, 'VarietyName' => $variety->VarietyName]
            ]);
        }
        else{
            if($this->order_lines->contains('VarietyId', $variety->id)){
                foreach ($this->order_lines as $key => $value) {
                    $ordered = (object) $value;
                    if($ordered->VarietyId === $variety->id){
                        unset($this->order_lines[$key]);
                    }
                }
            }
            $this->order_lines->push(['VarietyId' => $variety->id, 'VarietyRangeId' => $variety->VarietyRangeId, 'Length' => substr($this->length,3), 'BoxType' => $this->packRate->id, 'StemQty' => $variety->stems, 'PackRate' => $variety->packrate, 'Boxes' => $variety->quantity, 'Farm' => $selectedBrand->farm, 'VarietyName' => $variety->VarietyName]);
        }

        session(['order_lines' => $this->order_lines]);
    }

    public function render()
    {
        return view('livewire.mixed-box');
    }
}
