<?php

namespace Database\Seeders;

use App\Models\Accessory;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $earphoneCat = new Category;
        $earphoneCat->name = "earphones";
        $earphoneCat->preview_url = "shared/desktop/image-category-thumbnail-earphones.png";
        $earphoneCat->save();

        $headphoneCat = new Category;
        $headphoneCat->name = "headphones";
        $headphoneCat->preview_url = "shared/desktop/image-category-thumbnail-headphones.png";
        $headphoneCat->save();

        $speakerCat = new Category;
        $speakerCat->name = "speakers";
        $speakerCat->preview_url = "shared/desktop/image-category-thumbnail-speakers.png";
        $speakerCat->save();

        $yx1 = new Product;
        $yx1->slug = "yx1-earphones";
        $yx1->name = 'YX1 Wireless Earphones';
        $yx1->new = true;
        $yx1->price = 599;
        $yx1->description = "Tailor your listening experience with bespoke dynamic drivers from the new YX1 Wireless Earphones. Enjoy incredible high-fidelity sound even in noisy environments with its active noise cancellation feature.";
        $yx1->features = "Experience unrivalled stereo sound thanks to innovative acoustic technology. With improved ergonomics designed for full day wearing, these revolutionary earphones have been finely crafted to provide you with the perfect fit, delivering complete comfort all day long while enjoying exceptional noise isolation and truly immersive sound.\n\nThe YX1 Wireless Earphones features customizable controls for volume, music, calls, and voice assistants built into both earbuds. The new 7-hour battery life can be extended up to 28 hours with the charging case, giving you uninterrupted play time. Exquisite craftsmanship with a splash resistant design now available in an all new white and grey color scheme as well as the popular classic black.";

        $earphoneCat->products()->save($yx1);

        $yx1->accessories()->saveMany([
            new Accessory(['name' => 'Earphone unit', 'quantity' => 2]),
            new Accessory(['name' => 'Multi-size earplugs', 'quantity' => 6]),
            new Accessory(['name' => 'User manual', 'quantity' => 1]),
            new Accessory(['name' => 'USB-C charging cable', 'quantity' => 1]),
            new Accessory(['name' => 'Travel pouch', 'quantity' => 1]),
        ]);
        $yx1->images()->saveMany([
            new ProductImage(['url' => 'products/product-yx1-earphones/mobile/image-product.jpg', 'type' => 'main', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-yx1-earphones/tablet/image-product.jpg', 'type' => 'main', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-yx1-earphones/desktop/image-product.jpg', 'type' => 'main', 'device' => 'desktop']),
            new ProductImage(['url' => 'products/product-yx1-earphones/mobile/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-yx1-earphones/tablet/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-yx1-earphones/desktop/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'desktop']),

            new ProductImage(['url' => 'products/product-yx1-earphones/mobile/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-yx1-earphones/tablet/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-yx1-earphones/desktop/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 1]),

            new ProductImage(['url' => 'products/product-yx1-earphones/mobile/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-yx1-earphones/tablet/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-yx1-earphones/desktop/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 2]),

            new ProductImage(['url' => 'products/product-yx1-earphones/mobile/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-yx1-earphones/tablet/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-yx1-earphones/desktop/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 3])
        ]);

        $xx59 = new Product;
        $xx59->slug = "xx59-headphones";
        $xx59->name = 'XX59 Headphones';
        $xx59->new = false;
        $xx59->price = 899;
        $xx59->description = "Enjoy your audio almost anywhere and customize it to your specific tastes with the XX59 headphones. The stylish yet durable versatile wireless headset is a brilliant companion at home or on the move.";
        $xx59->features = "These headphones have been created from durable, high-quality materials tough enough to take anywhere. Its compact folding design fuses comfort and minimalist style making it perfect for travel. Flawless transmission is assured by the latest wireless technology engineered for audio synchronization with videos.\n\nMore than a simple pair of headphones, this headset features a pair of built-in microphones for clear, hands-free calling when paired with a compatible smartphone. Controlling music and calls is also intuitive thanks to easy-access touch buttons on the earcups. Regardless of how you use the XX59 headphones, you can do so all day thanks to an impressive 30-hour battery life that can be rapidly recharged via USB-C.";

        $xx99 = new Product;
        $xx99->slug = "xx99-mark-one-headphones";
        $xx99->name = 'XX99 Mark I Headphones';
        $xx99->new = false;
        $xx99->price = 1750;
        $xx99->description = "As the gold standard for headphones, the classic XX99 Mark I offers detailed and accurate audio reproduction for audiophiles, mixing engineers, and music aficionados alike in studios and on the go.";
        $xx99->features = "As the headphones all others are measured against, the XX99 Mark I demonstrates over five decades of audio expertise, redefining the critical listening experience. This pair of closed-back headphones are made of industrial, aerospace-grade materials to emphasize durability at a relatively light weight of 11 oz.\n\nFrom the handcrafted microfiber ear cushions to the robust metal headband with inner damping element, the components work together to deliver comfort and uncompromising sound. Its closed-back design delivers up to 27 dB of passive noise cancellation, reducing resonance by reflecting sound to a dedicated absorber. For connectivity, a specially tuned cable is includes with a balanced gold connector.";

        $xx992 = new Product;
        $xx992->slug = "xx99-mark-two-headphones";
        $xx992->name = 'XX99 Mark II Headphones';
        $xx992->new = true;
        $xx992->price = 2999;
        $xx992->description = "The new XX99 Mark II is the pinnacle of pristine audio. It redefines your premium headphone experience by reproducing the balanced depth and precision of studio-quality sound.";
        $xx992->features = "Featuring a genuine leather head strap and premium earcups, these headphones deliver superior comfort for those who like to enjoy endless listening. It includes intuitive controls designed for any situation. Whether you’re taking a business call or just in your own personal space, the auto on/off and pause features ensure that you’ll never miss a beat.\n\nThe advanced Active Noise Cancellation with built-in equalizer allow you to experience your audio world on your terms. It lets you enjoy your audio in peace, but quickly interact with your surroundings when you need to. Combined with Bluetooth 5. 0 compliant connectivity and 17 hour battery life, the XX99 Mark II headphones gives you superior sound, cutting-edge technology, and a modern design aesthetic.";

        $headphoneCat->products()->saveMany([$xx59, $xx99, $xx992]);

        $zx7 = new Product;
        $zx7->slug = "zx7-speaker";
        $zx7->name = 'ZX7 Speaker';
        $zx7->new = false;
        $zx7->price = 3500;
        $zx7->description = "Stream high quality sound wirelessly with minimal to no loss. The ZX7 speaker uses high-end audiophile components that represents the top of the line powered speakers for home or studio use.";
        $zx7->features = "Reap the advantages of a flat diaphragm tweeter cone. This provides a fast response rate and excellent high frequencies that lower tiered bookshelf speakers cannot provide. The woofers are made from aluminum that produces a unique and clear sound. XLR inputs allow you to connect to a mixer for more advanced usage.\n\nThe ZX7 speaker is the perfect blend of stylish design and high performance. It houses an encased MDF wooden enclosure which minimises acoustic resonance. Dual connectivity allows pairing through bluetooth or traditional optical and RCA input. Switch input sources and control volume at your finger tips with the included wireless remote. This versatile speaker is equipped to deliver an authentic listening experience.";

        $zx9 = new Product;
        $zx9->slug = "zx9-speaker";
        $zx9->name = 'ZX9 Speaker';
        $zx9->new = true;
        $zx9->price = 4500;
        $zx9->description = "Upgrade your sound system with the all new ZX9 active speaker. It’s a bookshelf speaker system that offers truly wireless connectivity -- creating new possibilities for more pleasing and practical audio setups.";
        $zx9->features = "Connect via Bluetooth or nearly any wired source. This speaker features optical, digital coaxial, USB Type-B, stereo RCA, and stereo XLR inputs, allowing you to have up to five wired source devices connected for easy switching. Improved bluetooth technology offers near lossless audio quality at up to 328ft (100m).\n\nDiscover clear, more natural sounding highs than the competition with ZX9’s signature planar diaphragm tweeter. Equally important is its powerful room-shaking bass courtesy of a 6.5” aluminum alloy bass unit. You’ll be able to enjoy equal sound quality whether in a large room or small den. Furthermore, you will experience new sensations from old songs since it can respond to even the subtle waveforms.";

        $speakerCat->products()->saveMany([$zx7, $zx9]);

        $xx99->accessories()->saveMany([
            new Accessory(['name' => 'Headphone unit', 'quantity' => 1]),
            new Accessory(['name' => 'Replacement earcups', 'quantity' => 2]),
            new Accessory(['name' => 'User manual', 'quantity' => 1]),
            new Accessory(['name' => '3.5mm 5m audio cable', 'quantity' => 1]),
        ]);
        $xx99->images()->saveMany([
            // Main
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/mobile/
            image-product.jpg', 'type' => 'main', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/tablet/image-product.jpg', 'type' => 'main', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/desktop/image-product.jpg', 'type' => 'main', 'device' => 'desktop']),
            // Preview
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/mobile/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/tablet/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/desktop/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'desktop']),
            // Gallery 1
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/mobile/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/tablet/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/desktop/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 1]),
            // Gallery 2
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/mobile/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/tablet/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/desktop/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 2]),
            // Gallery 3
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/mobile/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/tablet/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-xx99-mark-one-headphones/desktop/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 3])
        ]);

        $xx59->accessories()->saveMany([
            new Accessory(['name' => 'Headphone unit', 'quantity' => 1]),
            new Accessory(['name' => 'Replacement earcups', 'quantity' => 2]),
            new Accessory(['name' => 'User manual', 'quantity' => 1]),
            new Accessory(['name' => '3.5mm 5m audio cable', 'quantity' => 1]),
        ]);
        $xx59->images()->saveMany([
            new ProductImage(['url' => 'products/product-xx59-headphones/mobile/image-product.jpg', 'type' => 'main', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-xx59-headphones/tablet/image-product.jpg', 'type' => 'main', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-xx59-headphones/desktop/image-product.jpg', 'type' => 'main', 'device' => 'desktop']),
            new ProductImage(['url' => 'products/product-xx59-headphones/mobile/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-xx59-headphones/tablet/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-xx59-headphones/desktop/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'desktop']),

            new ProductImage(['url' => 'products/product-xx59-headphones/mobile/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-xx59-headphones/tablet/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-xx59-headphones/desktop/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 1]),

            new ProductImage(['url' => 'products/product-xx59-headphones/mobile/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-xx59-headphones/tablet/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-xx59-headphones/desktop/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 2]),

            new ProductImage(['url' => 'products/product-xx59-headphones/mobile/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-xx59-headphones/tablet/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-xx59-headphones/desktop/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 3])
        ]);

        $xx992->accessories()->saveMany([
            new Accessory(['name' => 'Headphone unit', 'quantity' => 1]),
            new Accessory(['name' => 'Replacement earcups', 'quantity' => 2]),
            new Accessory(['name' => 'User manual', 'quantity' => 1]),
            new Accessory(['name' => '3.5mm 5m audio cable', 'quantity' => 1]),
            new Accessory(['name' => 'Travel bag', 'quantity' => 1]),
        ]);
        $xx992->images()->saveMany([
            // Main
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/mobile/
            image-product.jpg', 'type' => 'main', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/tablet/image-product.jpg', 'type' => 'main', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/desktop/image-product.jpg', 'type' => 'main', 'device' => 'desktop']),
            // Preview
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/mobile/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/tablet/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/desktop/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'desktop']),
            // Gallery 1
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/mobile/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/tablet/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/desktop/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 1]),
            // Gallery 2
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/mobile/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/tablet/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/desktop/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 2]),
            // Gallery 3
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/mobile/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/tablet/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-xx99-mark-two-headphones/desktop/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 3])
        ]);

        $zx7->accessories()->saveMany([
            new Accessory(['name' => 'Speaker unit', 'quantity' => 2]),
            new Accessory(['name' => 'Speaker cloth panel', 'quantity' => 2]),
            new Accessory(['name' => 'User manual', 'quantity' => 1]),
            new Accessory(['name' => '3.5mm 7.5m audio cable', 'quantity' => 1]),
            new Accessory(['name' => '7.5m optical cable', 'quantity' => 1]),
        ]);
        $zx7->images()->saveMany([
            // Main
            new ProductImage(['url' => 'products/product-zx7-speaker/mobile/
            image-product.jpg', 'type' => 'main', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-zx7-speaker/tablet/image-product.jpg', 'type' => 'main', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-zx7-speaker/desktop/image-product.jpg', 'type' => 'main', 'device' => 'desktop']),
            // Preview
            new ProductImage(['url' => 'products/product-zx7-speaker/mobile/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-zx7-speaker/tablet/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-zx7-speaker/desktop/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'desktop']),
            // Gallery 1
            new ProductImage(['url' => 'products/product-zx7-speaker/mobile/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-zx7-speaker/tablet/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-zx7-speaker/desktop/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 1]),
            // Gallery 2
            new ProductImage(['url' => 'products/product-zx7-speaker/mobile/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-zx7-speaker/tablet/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-zx7-speaker/desktop/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 2]),
            // Gallery 3
            new ProductImage(['url' => 'products/product-zx7-speaker/mobile/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-zx7-speaker/tablet/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-zx7-speaker/desktop/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 3])
        ]);

        $zx9->accessories()->saveMany([
            new Accessory(['name' => 'Speaker unit', 'quantity' => 2]),
            new Accessory(['name' => 'Speaker cloth panel', 'quantity' => 2]),
            new Accessory(['name' => 'User manual', 'quantity' => 1]),
            new Accessory(['name' => '3.5mm 10m audio cable', 'quantity' => 1]),
            new Accessory(['name' => '10m optical cable', 'quantity' => 1]),
        ]);
        $zx9->images()->saveMany([
            // Main
            new ProductImage(['url' => 'products/product-zx9-speaker/mobile/
            image-product.jpg', 'type' => 'main', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-zx9-speaker/tablet/image-product.jpg', 'type' => 'main', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-zx9-speaker/desktop/image-product.jpg', 'type' => 'main', 'device' => 'desktop']),
            // Preview
            new ProductImage(['url' => 'products/product-zx9-speaker/mobile/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'mobile']),
            new ProductImage(['url' => 'products/product-zx9-speaker/tablet/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'tablet']),
            new ProductImage(['url' => 'products/product-zx9-speaker/desktop/image-category-page-preview.jpg', 'type' => 'preview', 'device' => 'desktop']),
            // Gallery 1
            new ProductImage(['url' => 'products/product-zx9-speaker/mobile/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-zx9-speaker/tablet/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 1]),
            new ProductImage(['url' => 'products/product-zx9-speaker/desktop/image-gallery-1.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 1]),
            // Gallery 2
            new ProductImage(['url' => 'products/product-zx9-speaker/mobile/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-zx9-speaker/tablet/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 2]),
            new ProductImage(['url' => 'products/product-zx9-speaker/desktop/image-gallery-2.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 2]),
            // Gallery 3
            new ProductImage(['url' => 'products/product-zx9-speaker/mobile/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'mobile', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-zx9-speaker/tablet/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'tablet', 'sequence' => 3]),
            new ProductImage(['url' => 'products/product-zx9-speaker/desktop/image-gallery-3.jpg', 'type' => 'gallery', 'device' => 'desktop', 'sequence' => 3])
        ]);
    }
}
