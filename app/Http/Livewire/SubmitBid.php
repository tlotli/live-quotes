<?php

namespace App\Http\Livewire;

use App\QuoteItem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SubmitBid extends Component
{
    public $quotation_request_id;
    public $updateMode = 0;
    public $status;
    public $quantity;
    public $price;
    public $description;
    public $selectedId;

    public function resetInput()
    {
        $this->quantity = "";
        $this->price = "";
        $this->description = "";
    }

    public function submit()
    {
        $this->validate([
            'quantity' => 'numeric|required',
            'price' => 'numeric|required',
            'description' => 'required|max:200',
        ],
            [
                'quantity.numeric' => 'Please provide a valid number',
                'quantity.required' => 'Quantity is required',
                'price.numeric' => 'Please provide a valid number',
                'price.required' => 'Price is required',
                'description.required' => 'Description is required',
            ]);

        $quote_item = new QuoteItem();
        $quote_item->quantity = $this->quantity;
        $quote_item->price = $this->price;
        $quote_item->description = $this->description;
        $quote_item->business_profile_id = Auth::user()->business_profile_id;
        $quote_item->quotation_request_id = $this->quotation_request_id;
        $quote_item->save();

        $this->resetValidation();
        $this->resetInput();;

//        $this->emit('alert', ['type' => 'success', 'message' => 'Item Added']);
//        return redirect(route('submit_bid' ,['id' => $this->quotation_request_id]));
    }

    public function edit($id)
    {
        $this->selectedId = $id;
        $quote_item = QuoteItem::find($this->selectedId);
        $this->quantity = $quote_item->quantity;
        $this->price = $quote_item->price;
        $this->description = $quote_item->description;
        $this->resetValidation();
        $this->updateMode = 1;
    }

    public function update()
    {
        $this->validate([
            'quantity' => 'numeric|required',
            'price' => 'numeric|required',
            'description' => 'required|max:200',
        ],
            [
                'quantity.numeric' => 'Please provide a valid number',
                'quantity.required' => 'Quantity is required',
                'price.numeric' => 'Please provide a valid number',
                'price.required' => 'Price is required',
                'description.required' => 'Description is required',
            ]);

        $quote_item = QuoteItem::find($this->selectedId);
        $quote_item->quantity = $this->quantity;
        $quote_item->price = $this->price;
        $quote_item->description = $this->description;
        $quote_item->save();

        $this->updateMode = 0;
        $this->resetValidation();
        $this->resetInput();

//        $this->emit('alert', ['type' => 'success', 'message' => 'Item Updated']);
    }

    public function mount($id)
    {
        $this->quotation_request_id = $id;
    }

    public function render()
    {
        $quote_items = QuoteItem::where('quotation_request_id', $this->quotation_request_id)->where('business_profile_id', Auth::user()->business_profile_id)->get();
        $quote_item_count = QuoteItem::where('quotation_request_id', $this->quotation_request_id)->where('business_profile_id', Auth::user()->business_profile_id)->get();
        $quote_item_count_items = QuoteItem::where('quotation_request_id', $this->quotation_request_id)->where('business_profile_id', Auth::user()->business_profile_id)->count();

        $quote_item_sum = DB::table('quote_items')
            ->where('quote_items.quotation_request_id', $this->quotation_request_id)
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->select(DB::raw('SUM(quote_items.price * quote_items.quantity) AS total_price'))
            ->first();

        $bid_id = $this->quotation_request_id ;
        return view('livewire.submit-bid', compact('quote_item_count', 'quote_items', 'quote_item_sum' , 'bid_id' , 'quote_item_count' ,'quote_item_count_items'));
    }

    public function delete($id) {
        if($id) {
            QuoteItem::destroy($id);
            $this->updateMode = 0;
//            $this->emit('alert', ['type' => 'success', 'message' => 'Item Removed']);
            $this->resetValidation();
            $this->resetInput();
        }
    }
}
