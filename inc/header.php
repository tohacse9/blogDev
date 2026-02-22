<?php 
  include 'lib/Database.php';
  include 'config/config.php';
  include 'helpers/Format.php';

  $db = new Database();
  $fm = new Format();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      if (isset($_GET['pageid'])) {
          $pageTitle = $_GET['pageid'];
          $query = "SELECT * FROM tbl_page WHERE id = '$pageTitle'";
          $gettitle = $db->select($query);
          if ($gettitle) {
            while ($result = $gettitle->fetch_assoc()) { ?>
              <title><?php echo $result['name']?> - <?php echo TITLE?></title>
          <?php } }
      } elseif (isset($_GET['id'])) {
          $postid = $_GET['id'];
          $query = "SELECT * FROM tbl_post WHERE id = '$postid'";
          $postID = $db->select($query);
          if ($postID) {
            while ($result = $postID->fetch_assoc()) { ?>
              <title><?php echo $result['title']?> - <?php echo TITLE?></title>
          <?php } }
      } else { ?>
          <title><?php echo $fm->title() ?> - <?php echo TITLE?></title>
      <?php } ?>      
    
    <link rel="icon" href="images/icon.jpeg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                jhakanaka: '#FF4B2B',
                darkblue: '#1e293b',
              }
            }
          }
        }
    </script>
    
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">  
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css">
    
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect:'random', slices:10, animSpeed:500, pauseTime:5000,
            directionNav:false, controlNav:false, pauseOnHover:true
        });
    });
    </script>
</head>

<body class="bg-[#0b0e14] text-slate-300 font-sans">

<header class="bg-[#0b0e14] border-b border-white/5 py-8">
    <div class="max-w-[958px] mx-auto flex justify-between items-center px-4">
        
        <?php
        $query = "SELECT * FROM title_slogan WHERE id = 1";
        $getData = $db->select($query);
        if ($getData) {
            while ($result = $getData->fetch_assoc()) { ?>      
            <a href="index.php" class="flex items-center space-x-4 group">
                <div class="relative">
                    <div class="absolute -inset-1 bg-[#3DDC84] rounded-[20px] blur opacity-20 group-hover:opacity-50 transition duration-500"></div>
                    <img class="relative w-[70px] h-[70px] rounded-[18px] border border-white/10 object-cover" 
                         src="admin/<?php echo $result['logo'] ?>" alt="Logo"/>
                </div>
                <div>
                    <h2 class="text-white text-3xl font-black tracking-tight leading-none">
                        Android<span class="text-[#3DDC84]">Experts</span>
                    </h2>
                    <p class="text-slate-500 text-[10px] font-bold tracking-[0.2em] uppercase mt-1">
                        <?php echo $result['slogan'] ?>
                    </p>
                </div>
            </a>
        <?php } } ?>

        <div class="hidden md:block">
            <form action="search.php" method="get" class="flex items-center bg-white/5 border border-white/10 rounded-full px-4 py-1.5 focus-within:border-[#3DDC84]/50 transition-all">
                <input class="bg-transparent border-none focus:ring-0 text-sm text-white w-40 placeholder-slate-600" 
                       type="text" name="search" placeholder="Search..."/>
                <button type="submit" name="submit" class="text-slate-500 hover:text-[#3DDC84] ml-2">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</header>

<nav class="sticky top-0 z-50 bg-[#0b0e14]/90 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-[958px] mx-auto px-4">
        <?php $currentPage = basename($_SERVER['SCRIPT_FILENAME'], '.php'); ?>
        <ul class="flex items-center space-x-1 py-2">
            <li>
                <a href="index.php" 
                   class="nav-btn <?php echo ($currentPage == 'index') ? 'active-btn' : ''; ?>">
                   <i class="fa fa-home mr-2 opacity-70"></i>Home
                </a>
            </li>

            <?php
            $query = "SELECT * FROM tbl_page";
            $pages = $db->select($query);
            if ($pages) {
                while ($result = $pages->fetch_assoc()) { ?>  
                <li>
                    <a href="page.php?pageid=<?php echo $result['id']?>" 
                       class="nav-btn <?php echo (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) ? 'active-btn' : ''; ?>">
                       <?php echo $result['name']?>
                    </a>
                </li>
            <?php } } ?>

            <li>
                <a href="contact.php" 
                   class="nav-btn <?php echo ($currentPage == 'contact') ? 'active-btn' : ''; ?>">
                   <i class="fa fa-envelope mr-2 opacity-70"></i>Contact
                </a>
            </li>
        </ul>
    </div>
</nav>

<style>
    /* Modern Nav Buttons */
    .nav-btn {
        display: flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.5px;
        color: #94a3b8;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    /* Hover State */
    .nav-btn:hover {
        color: #3DDC84;
        background: rgba(61, 220, 132, 0.08);
    }

    /* Active State (Android Style Pill) */
    .active-btn {
        color: #000 !important;
        background: #3DDC84 !important;
        box-shadow: 0 4px 15px rgba(61, 220, 132, 0.3);
    }

    /* Responsive fix for mobile scrolling nav */
    @media (max-width: 768px) {
        ul {
            overflow-x: auto;
            white-space: nowrap;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        ul::-webkit-scrollbar {
            display: none;
        }
    }
</style>

<style>
    /* CSS for the New Style */
    .nav-btn {
        @apply text-slate-400 font-bold uppercase tracking-widest text-[11px] px-6 py-4 block transition-all duration-300 hover:text-[#3DDC84];
    }
    
    .active-btn {
        @apply text-[#3DDC84] !important;
        position: relative;
    }

    /* Green line indicator like Android OS */
    .active-btn::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 25%;
        width: 50%;
        height: 3px;
        background: #3DDC84;
        border-radius: 10px 10px 0 0;
        box-shadow: 0 -2px 10px rgba(61, 220, 132, 0.4);
    }

    /* Content Area Styles */
    .maincontent, .sidebar {
        background: #151921 !important;
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        border-radius: 24px !important;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
        padding: 30px !important;
        margin-bottom: 24px;
    }

    .samesidebar h2 {
        background: rgba(61, 220, 132, 0.1) !important;
        border-left: 4px solid #3DDC84 !important;
        color: #3DDC84 !important;
        font-weight: 800 !important;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    input[type='submit'] {
        background: #3DDC84 !important;
        color: #000 !important;
        font-weight: 800 !important;
        text-transform: uppercase;
        border-radius: 12px !important;
        padding: 10px 20px !important;
    }
</style>