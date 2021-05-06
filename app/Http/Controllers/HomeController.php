<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $random = $this->random();
        return view('home',compact('random'));
    }

    public function random()
    {
      $phrases = array(
        'Therefore do not worry about tomorrow, for tomorrow will worry about itself. Each day has enough trouble of its own. ~Matthew 6:34',
        'For whoever wants to save their life will lose it, but whoever loses their life for me will find it. ~Matthew 16:25',
        'When times are good, be happy; but when times are bad, consider this: God has made the one as well as the other. Therefore, no one can discover anything about their future. ~Ecclesiastes 7:14',
        'Don’t let anyone look down on you because you are young, but set an example for the believers in speech, in conduct, in love, in faith and in purity. ~1 Timothy 4:12',
        'This is how God showed his love among us: He sent his one and only Son into the world that we might live through him. ~1 John 4:9',
        'Therefore I tell you, do not worry about your life, what you will eat or drink; or about your body, what you will wear. Is not life more than food, and the body more than clothes? ~Matthew 6:25',
        'Blessed is the one who perseveres under trial because, having stood the test, that person will receive the crown of life that the Lord has promised to those who love him. ~James 1:12',
        'Above all else, guard your heart, for everything you do flows from it. ~Proverbs 4:23',
        'Do not conform to the pattern of this world, but be transformed by the renewing of your mind. Then you will be able to test and approve what God’s will is—his good, pleasing and perfect will. ~Romans 12:2',
        'Fear not, for I am with you;  be not dismayed, for I am your God;  I will strengthen you, I will help you,  I will uphold you with  my righteous right hand. ~Isaiah 41:10',
        'Trust in the LORD with all your heart,  and do not lean on your own understanding. 6  In all your ways  acknowledge him,  and he will make straight your paths. ~Proverbs 3:5-5',
        'Let us hold fast the confession of our hope without wavering, for he who promised is faithful. ~Hebrews 10:23',
        'Seek the LORD and his strength; seek his presence continually!  ~ 1 Chronicles 16:11',
        'Say to those who have an anxious heart,  “Be strong; fear not!  Behold, your God will come with vengeance, with the recompense of God.   He will come and save you.” ~Isaiah 35:4'
      );

      return $phrases[array_rand($phrases)];
    }
}
