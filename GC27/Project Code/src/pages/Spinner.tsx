import PulseLoader from "react-spinners/PulseLoader";

function Spinner() {
  return (
    <div className="flex items-center w-full justify-center py-4" >
      <PulseLoader color="#ffffff" margin={4} size={19} speedMultiplier={1} />
    </div>
  );
}

export default Spinner;
