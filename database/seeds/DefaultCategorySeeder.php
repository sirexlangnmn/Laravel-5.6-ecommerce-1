<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class DefaultCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category' => 'Men',
            'parent_id' => 0,
            'description' => 'All Men Wear and Accessories',
            'url' => 'Men-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Women',
            'parent_id' => 0,
            'description' => 'All Women Wear and Accessories',
            'url' => 'Women-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Kids',
            'parent_id' => 0,
            'description' => 'All Kids Wear and Accessories',
            'url' => 'Kids-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Electronic Gadgets',
            'parent_id' => 0,
            'description' => 'All Computer, Mobile, and other Electronic Gadgets',
            'url' => 'ComputerMobileGadgets-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Households',
            'parent_id' => 0,
            'description' => 'All households item and products',
            'url' => 'Households-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Food and Drinks',
            'parent_id' => 0,
            'description' => 'All Food and Drinks',
            'url' => 'FoodAndDrinks-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Transport Unit',
            'parent_id' => 0,
            'description' => 'All Types of Vehicles',
            'url' => 'TransportUnit-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Beautiful Ladies',
            'parent_id' => 0,
            'description' => 'All Beautiful Ladies',
            'url' => 'BeautifulLadies-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Academics Item',
            'parent_id' => 0,
            'description' => 'All Academics Item',
            'url' => 'AcademicsItem-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'T-Shirt',
            'parent_id' => 1,
            'description' => 'All Men\'s T-Shirt',
            'url' => 'Men-t-shirt-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Pants',
            'parent_id' => 1,
            'description' => 'All Men\'s Pants',
            'url' => 'Men-pants-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Blouse',
            'parent_id' => 2,
            'description' => 'All Women\'s Blouse',
            'url' => 'Women-blouse-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Shorts',
            'parent_id' => 2,
            'description' => 'All Women\'s Shorts',
            'url' => 'Women-shorts-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Shorts',
            'parent_id' => 3,
            'description' => 'All Kid\'s Shorts',
            'url' => 'Kids-shorts-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Computer',
            'parent_id' => 4,
            'description' => 'All Computer',
            'url' => 'ElectronicGadgets-computer-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Mobiles',
            'parent_id' => 4,
            'description' => 'All Mobiles',
            'url' => 'ElectronicGadgets-mobiles-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Washing Machine',
            'parent_id' => 5,
            'description' => 'All Washing Machine',
            'url' => 'Households-washing-machine-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'TV',
            'parent_id' => 5,
            'description' => 'All TV',
            'url' => 'Househods-tv-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Wine',
            'parent_id' => 6,
            'description' => 'All Wines',
            'url' => 'FoodAndDrinks-wine-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Cakes',
            'parent_id' => 6,
            'description' => 'All Cakes',
            'url' => 'FoodAndDrinks-cakes-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Van',
            'parent_id' => 7,
            'description' => 'All Van',
            'url' => 'TransportUnit-van-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Car',
            'parent_id' => 7,
            'description' => 'All Cars',
            'url' => 'TransportUnit-car-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Books',
            'parent_id' => 9,
            'description' => 'All Books',
            'url' => 'AcademicsItem-books-',
            'status' => 1
        ]);

        Category::create([
            'category' => 'Notebook',
            'parent_id' => 9,
            'description' => 'All Notebooks',
            'url' => 'AcademicsItem-notebooks-',
            'status' => 1
        ]);
      
    }
}
