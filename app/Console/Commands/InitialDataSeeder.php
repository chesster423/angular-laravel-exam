<?php

namespace App\Console\Commands;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductStructure;
use App\Models\Subscription;
use App\Models\SubscriptionCycle;
use App\Models\SubscriptionSelection;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class InitialDataSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-data:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    protected $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->createMenu();
        $this->createMeals();
        $this->createProducts();
        $this->createCustomer();
        $this->createSubscriptions();
    }

    protected function createMenu()
    {
        $menus = [
            [
                'label' => 'Slim & Trim',
                'vegetarian' => 0,
                'status' => 1,
            ],[
                'label' => 'Everyday',
                'vegetarian' => 0,
                'status' => 1,
            ],[
                'label' => 'Snack',
                'vegetarian' => 0,
                'status' => 1,
            ],[
                'label' => 'Drink',
                'vegetarian' => 0,
                'status' => 1,
            ],[
                'label' => 'Breakfast',
                'vegetarian' => 0,
                'status' => 1,
            ],[
                'label' => 'Side',
                'vegetarian' => 0,
                'status' => 1,
            ]
        ];

        foreach ($menus as $menu) {
            Menu::query()->updateOrCreate($menu);
        }
    }

    protected function createMeals()
    {
        $meals = [
            [
                'meal_sku' => "U8KW8GC6A_PAN_CG_S",
                'meal_name' => "Pan Fried Chicken, Roasted Pumpkin & Kale (NG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Pan-Fried-Chicken%2C-Roasted-Pumpkin-%26-Kale1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "DKFT4H2YXP_CHI_CG_S",
                'meal_name' => "Chicken Cacciatore, Classic Mashed Potatoes (NG)",
                'meal_image' => "https://cg-imgs.s3.ap-southeast-2.amazonaws.com/Chicken-Cacciatore-Classic-Mashed-Potatoes.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "6QKYC5J6XS_CHI_CG_S",
                'meal_name' => "Chicken, Zucchini & Salsa Verde Pasta ",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Chicken%2C-Zucchini-%26-Salsa-Verde-Pasta1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "L7D9WUYD_BLA_CG_L",
                'meal_name' => "Black Bean Tofu & Vegetable, Brown Rice (V)(VG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Black-Bean-Tofu-%26-Vegetable%2C-Brown-Rice.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "3CBT4XDMXL_VEG_CG_L",
                'meal_name' => "Vegan Indian Biryani (V)(VG)(NG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Vegan-Indian-Biryani.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "DAQF9ZX8P_GRE_CG_L",
                'meal_name' => "Greek Meatballs, Tomato, Dill & Feta Risoni ",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Greek-Meatballs%2C-tomato%2C-dill-%26-feta-risoni1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "864BTMXZL_CHI_CG_L",
                'meal_name' => "Chicken Stroganoff, Mixed Potato Mash (NG)",
                'meal_image' => "https://cg-imgs.s3.ap-southeast-2.amazonaws.com/Chicken-Stroganoff%2C-mixed-potato-mash3.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "4M88DPPWP_PUM_CG_L",
                'meal_name' => "Pumpkin, Cumin & Ricotta Filo Bake (V)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Pumpkin%2C-Cumin-%26-Ricotta-Filo-Bake1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "E25S3GBUXP_GNO_CG_L",
                'meal_name' => "Gnocchi Carbonara, Zucchini & Parmesan ",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Gnocchi-Carbonara%2C-Zucchini-%26-Parmesan1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "T4G5HKR2P_ROA_CG_L",
                'meal_name' => "Roast Beef, Carrots, Peas & Red Wine Sauce (NG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Roast-Beef%2C-Carrots%2C-Peas-%26-Red-Wine-Sauce.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "W3A4P2ZFAM_ITA_CG_L",
                'meal_name' => "Italian Tuna & Corn Salad, Baby Spinach (NG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Italian-Tuna-%26-Corn-Salad%2C-Wild-Rocket.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "2Y43T7LF_BLA_CG_S",
                'meal_name' => "Black Bean Tofu & Vegetable, Brown Rice (V)(VG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Black-Bean-Tofu-%26-Vegetable%2C-Brown-Rice.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "U4AK89WZXL_VEG_CG_S",
                'meal_name' => "Vegan Indian Biryani (V)(VG)(NG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Vegan-Indian-Biryani.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "T4G5HKP_GRE_CG_S",
                'meal_name' => "Greek Meatballs, Tomato, Dill & Feta Risoni ",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Greek-Meatballs%2C-tomato%2C-dill-%26-feta-risoni1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "864BTMXZXL_CHI_CG_S",
                'meal_name' => "Chicken Stroganoff, Mixed Potato Mash (NG)",
                'meal_image' => "https://cg-imgs.s3.ap-southeast-2.amazonaws.com/Chicken-Stroganoff%2C-mixed-potato-mash3.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "2AFWDG76XP_PUM_CG_S",
                'meal_name' => "Pumpkin, Cumin & Ricotta Filo Bake (V)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Pumpkin%2C-Cumin-%26-Ricotta-Filo-Bake1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "CS8YRMD6XP_GNO_CG_S",
                'meal_name' => "Gnocchi Carbonara, Zucchini & Parmesan ",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Gnocchi-Carbonara%2C-Zucchini-%26-Parmesan1.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "6LSLU2P_ROA_CG_S",
                'meal_name' => "Roast Beef, Carrots, Peas & Red Wine Sauce (NG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Roast-Beef%2C-Carrots%2C-Peas-%26-Red-Wine-Sauce.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "2BHUGZLXAM_ITA_CG_S",
                'meal_name' => "Italian Tuna & Corn Salad, Baby Spinach (NG)(ND)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/Italian-Tuna-%26-Corn-Salad%2C-Wild-Rocket.jpg",
                'status' => 1,
                'vegetarian' => 1
            ],
            [
                'meal_sku' => "VMB46GLFP_CHO_CG_L",
                'meal_name' => "Chocolate & Date Brownie (V)(NG)",
                'meal_image' => "https://d1dh0lfhyk3mh6.cloudfront.net/chocolate-%26-date-brownie3.jpg",
                'status' => 1,
                'vegetarian' => 1
            ]
        ];

        foreach ($meals as $meal) {
            Meal::query()->updateOrCreate($meal);
        }
    }

    protected function createProducts()
    {
        $products = [
            [
                "sku" => "DR-KS",
                "title" => "Kick-start",
                "price" => 4.90000000,
            ],
            [
                "sku" => "DR-BB",
                "title" => "Beetroot Boost",
                "price" => 4.90000000,
            ],
            [
                "sku" => "DR-EG",
                "title" => "Extreme Green",
                "price" => 4.90000000,
            ],
            [
                "sku" => "BR-PCHPUD",
                "title" => "Peach & Hazelnut Chia Pudding",
                "price" => 6.50000000,
            ],
            [
                "sku" => "BR-BRYSHK",
                "title" => "Berry, Yoghurt & Flaxseed Shake",
                "price" => 5.50000000,
            ],
            [
                "sku" => "BR-BIR",
                "title" => "Mango & Quinoa Bircher",
                "price" => 6.50000000,
            ],
            [
                "sku" => "ST-HP-5",
                "title" => "Slim & Trim - High Protein - 5 Meals",
                "price" => 57.50000000,
            ],
            [
                "sku" => "ST-HP-7",
                "title" => "Slim & Trim - High Protein - 7 Meals",
                "price" => 78.00000000,
            ],
            [
                "sku" => "ST-HP-10",
                "title" => "Slim & Trim - High Protein - 10 Meals",
                "price" => 109.00000000,
            ],
            [
                "sku" => "ST-HP-14",
                "title" => "Slim & Trim - High Protein - 14 Meals",
                "price" => 144.00000000,
            ],
            [
                "sku" => "EW-HP-5",
                "title" => "Everyday Wellness - High Protein - 5 Meals",
                "price" => 59.50000000,
            ],
            [
                "sku" => "EW-HP-7",
                "title" => "Everyday Wellness - High Protein - 7 Meals",
                "price" => 82.00000000,
            ],
            [
                "sku" => "EW-HP-10",
                "title" => "Everyday Wellness - High Protein - 10 Meals",
                "price" => 115.00000000,
            ],
            [
                "sku" => "EW-HP-14",
                "title" => "Everyday Wellness - High Protein - 14 Meals",
                "price" => 151.00000000,
            ],
            [
                "sku" => "SN-SEED",
                "title" => "Seed & Grain Slice",
                "price" => 4.50000000,
            ],
            [
                "sku" => "SN-CRKL",
                "title" => "Chocolate Crackle Coconut Bite",
                "price" => 3.00000000,
            ],
            [
                "sku" => "SN-MIXD",
                "title" => "Mixed Berry Coconut Bite",
                "price" => 3.00000000,
            ],
            [
                "sku" => "SN-HUMM",
                "title" => "Hummus & Carrot Sticks",
                "price" => 4.50000000,
            ],
            [
                "sku" => "SN-BUBB",
                "title" => "Peanut Bubble Crunch",
                "price" => 4.50000000,
            ]
        ];
        $menus = Menu::query()->get();
        $formatted = [];
        foreach ($menus as $menu) {
            if ($menu->label == 'Slim & Trim') {
                $formatted['ST'] = $menu->id;
            }

            if ($menu->label == 'Everyday') {
                $formatted['EW'] = $menu->id;
            }

            if ($menu->label == 'Snack') {
                $formatted['SN'] = $menu->id;
            }

            if ($menu->label == 'Drink') {
                $formatted['DR'] = $menu->id;
            }

            if ($menu->label == 'Breakfast') {
                $formatted['BR'] = $menu->id;
            }

            if ($menu->label == 'Side') {
                $formatted['SD'] = $menu->id;
            }
        }

        $meal_types = ['dinner', 'lunch', 'breakfast', 'snack', 'side', 'drink'];
        foreach ($products as $product) {
            $menu_id = 0;
            $no_meals = 1;
            if (stripos($product['sku'], 'ST-') !== false){
                $menu_id = $formatted['ST'];
                $no_meals = 5;
            }else if (stripos($product['sku'], 'EW-') !== false){
                $menu_id = $formatted['EW'];
                $no_meals = 5;
            }else if (stripos($product['sku'], 'DR-') !== false){
                $menu_id = $formatted['DR'];
            }else if (stripos($product['sku'], 'BR-') !== false){
                $menu_id = $formatted['BR'];
            }else if (stripos($product['sku'], 'SD-') !== false){
                $menu_id = $formatted['SD'];
            }else if (stripos($product['sku'], 'SN-') !== false){
                $menu_id = $formatted['SN'];
            }

            $product['menu_id'] = $menu_id;
            $product['sub_title'] = ' ';
            $product['image'] = ' ';


            $product = Product::query()->updateOrCreate($product);
            $product->structure()->save(new ProductStructure([
                'meal_type' => $meal_types[rand(0,5)],
                'no_meals' => $no_meals
            ]));

        }

    }

    protected function createCustomer()
    {
        $faker = (new Factory())->create();
        $password = $faker->password(6,12);
        $this->user = User::query()->updateOrCreate([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make($password),
        ]);

        Log::info($password);
    }

    protected function createSubscriptions()
    {
        $total_orders = 5;
        $total_orders_created = 0;
        $subscriptions_per_order = [2,3,5,7];

        $product_ids = Product::query()->pluck('id')->toArray();
        $total_products = count($product_ids);

        $meal_ids = Meal::query()->pluck('id')->toArray();
        $total_meals = count($meal_ids);

        do{

            $required_subscriptions_per_order = $subscriptions_per_order[rand(0,3)];
            $total_subscriptions_created = 0;
            $product_prices = [];

            $subscription_ids = [];
            $delivery_date = Carbon::now()->subDays(rand(1,8))->format('Y-m-d');

            do{
                $product_id = $product_ids[rand(0, ($total_products-1))];
                $product_found = Product::query()->with(['structure'])->find($product_id);
                $subscription_created = Subscription::query()->create([
                        'user_id' => $this->user->id,
                        'product_id' => $product_id,
                        'delivery_date' => $delivery_date,
                        'price' => $product_found->price
                ]);

                $cycles_created = $subscription_created->subscription_cycles()->save(new SubscriptionCycle([
                    'delivery_date' => $delivery_date,
                    'price' => $product_found->price
                ]));

                $subscription_ids[] = [
                    'product_id' => $product_id,
                    'subscription_id' => $subscription_created->id,
                    'subscription_cycle_id' => $cycles_created->id,
                    'price' => $product_found->price
                ];

                $product_prices[] = $product_found->price;

                $no_meals = $product_found->structure->no_meals;
                $meal_type = $product_found->structure->meal_type;
                $total_selections_created = 0;
                do{

                    $cycles_created->selections()->save(new SubscriptionSelection([
                        'user_id' => $this->user->id,
                        'product_id' => $product_id,
                        'meal_id' => $meal_ids[rand(0, ($total_meals-1))],
                        'meal_type' => $meal_type,
                        'delivery_date' => $delivery_date
                    ]));

                    $total_selections_created += 1;
                }while($total_selections_created < $no_meals);

                $total_subscriptions_created += 1;
            }while($total_subscriptions_created < $required_subscriptions_per_order);

            $order_created = Order::query()->create([
                'user_id' => $this->user->id,
                'delivery_date' => $delivery_date,
                'price' => array_sum($product_prices),
                'paid_price' => array_sum($product_prices),
                'status' => 'paid'
            ]);

            foreach ($subscription_ids as $subscription) {
                $order_created->order_items()->save(new OrderItem([
                    'product_id' => $subscription['product_id'],
                    'subscription_cycle_id' => $subscription['subscription_cycle_id'],
                    'price' => $subscription['price'],
                    'status' => 'paid'
                ]));
            }

            $total_orders_created += 1;
        }while($total_orders_created < $total_orders );

    }

}
