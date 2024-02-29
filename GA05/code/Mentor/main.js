const pieChart = () => {
    var xValues = ["Absent", "Placement", "Event", "Physical"];
    var yValues = [15, 49, 24, 75];
    var barColors = [
        "#b91d47",
        
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: false,
                text: "World Wide Wine Production 2018"
            }
        }
    });
}

    var connectButton = document.getElementById('connectButton');
    var additionalButtons = document.getElementById('additionalButtons');
    var callButton = document.getElementById('callButton');
    var videoCallButton = document.getElementById('videoCallButton');
    var localVideo = document.getElementById('localVideo');

    // JavaScript to toggle the display of additional buttons
    connectButton.addEventListener('click', function() {
      additionalButtons.style.display = additionalButtons.style.display === 'none' ? 'flex' : 'none';
    });

    // Example function to initiate an audio call (using WebRTC)
    callButton.addEventListener('click', function() {
      initiateAudioCall();
    });

    // Example function to initiate a video call (using WebRTC)
    videoCallButton.addEventListener('click', function() {
      initiateVideoCall();
    });

    function initiateAudioCall() {
        var peerConnection = new RTCPeerConnection();
      
        navigator.mediaDevices.getUserMedia({ audio: true })
          .then(function (stream) {
            stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
      
            // Create an offer and set it as the local description
            return peerConnection.createOffer();
          })
          .then(function (offer) {
            return peerConnection.setLocalDescription(offer);
          })
          .then(function () {
            // Send the offer to the other peer (placeholder for signaling server logic)
            alert('Sending offer: ' + JSON.stringify(peerConnection.localDescription));
          })
          .catch(function (error) {
            console.error('Error initiating audio call:', error);
          });
      }
      
      function initiateVideoCall() {
        var peerConnection = new RTCPeerConnection();
      
        navigator.mediaDevices.getUserMedia({ audio: true, video: true })
          .then(function (stream) {
            stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
      
            localVideo.srcObject = stream;
      
            // Create an offer and set it as the local description
            return peerConnection.createOffer();
          })
          .then(function (offer) {
            return peerConnection.setLocalDescription(offer);
          })
          .then(function () {
            // Send the offer to the other peer (placeholder for signaling server logic)
            alert('Sending offer: ' + JSON.stringify(peerConnection.localDescription));
          })
          .catch(function (error) {
            console.error('Error initiating video call:', error);
          });
      }
      
pieChart();
// bar charts 

