import {
  MdHomeFilled,
  MdOutlineSlowMotionVideo,
  MdSubscriptions,
  MdOutlineVideoLibrary,
  MdHistory,
  MdOutlineSmartDisplay,
  MdOutlineWatchLater,
  MdThumbUpOffAlt,
  MdOutlineSportsVolleyball,
  MdSettings,
  MdOutlinedFlag,
  MdOutlineHelpOutline,
  MdOutlineFeedback,
  MdOutlineMovieFilter,
} from "react-icons/md";
import {
  AiOutlineFire,
  AiOutlineShoppingCart,
  AiOutlineBulb,
} from "react-icons/ai";
import { GiLargeDress, GiNewspaper } from "react-icons/gi";
import { HiOutlineScissors } from "react-icons/hi";
import { IoMdWifi } from "react-icons/io";
import { TbMusic, TbDeviceGamepad2 } from "react-icons/tb";
import { GiFilmStrip } from "react-icons/gi";

const MainLinks = [
  {
    icon: <MdHomeFilled className="text-xl" />,
    name: "Home",
  },
  {
    icon: <MdOutlineSlowMotionVideo className="text-xl" />,
    name: "Shorts",
  },
  {
    icon: <MdSubscriptions className="text-xl" />,
    name: "Subscriptions",
  },
];

const SecondaryLinks = [
  {
    icon: <MdOutlineVideoLibrary className="text-xl" />,
    name: "Library",
  },
  {
    icon: <MdHistory className="text-xl" />,
    name: "History",
  },
  {
    icon: <MdOutlineSmartDisplay className="text-xl" />,
    name: "Your videos",
  },
  {
    icon: <MdOutlineMovieFilter className="text-xl" />,
    name: "Your movies",
  },
  {
    icon: <MdOutlineWatchLater className="text-xl" />,
    name: "Watch later",
  },
  {
    icon: <HiOutlineScissors className="text-xl" />,
    name: "Your clips",
  },
  {
    icon: <MdThumbUpOffAlt className="text-xl" />,
    name: "Liked videos",
  },
];

const SubscriptionLinks = [
  {
    icon: <AiOutlineFire className="text-xl" />,
    name: "Trending",
  },
  {
    icon: <AiOutlineShoppingCart className="text-xl" />,
    name: "Shopping",
  },
  {
    icon: <TbMusic className="text-xl" />,
    name: "Music",
  },
  {
    icon: <GiFilmStrip className="text-xl" />,
    name: "Movies",
  },
  {
    icon: <IoMdWifi className="text-xl" />,
    name: "Live",
  },
  {
    icon: <TbDeviceGamepad2 className="text-xl" />,
    name: "Gaming",
  },
  {
    icon: <GiNewspaper className="text-xl" />,
    name: "News",
  },
  {
    icon: <MdOutlineSportsVolleyball className="text-xl" />,
    name: "Sport",
  },
  {
    icon: <AiOutlineBulb className="text-xl" />,
    name: "Learning",
  },
  {
    icon: <GiLargeDress className="text-xl" />,
    name: "Fashion & Beauty",
  },
];

const TextLinks = [
  [
    "About",
    "Press",
    "Copyright",
    "Contact us",
    "Creator",
    "Advertise",
    "Developers",
  ],
  [
    "Terms",
    "Privacy",
    "Policy & Safety",
    "How YouTube works",
    "Test new features",
  ],
];

const FooterLinks = [
  {
    icon: <MdSettings className="text-xl" />,
    name: "Settings",
  },
  {
    icon: <MdOutlinedFlag className="text-xl" />,
    name: "Report history",
  },
  {
    icon: <MdOutlineHelpOutline className="text-xl" />,
    name: "Help",
  },
  {
    icon: <MdOutlineFeedback className="text-xl" />,
    name: "Send feedback",
  },
];

export { MainLinks, SecondaryLinks, SubscriptionLinks, TextLinks, FooterLinks };
