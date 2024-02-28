// Import necessary components and icons
import React, { Component } from 'react';
import PropTypes from 'prop-types';
// import { GridList, GridTile } from 'material-ui/GridList';
import IconButton from 'material-ui/IconButton';
import ZoomIn from 'material-ui/svg-icons/action/zoom-in';
import FileDownload from 'material-ui/svg-icons/file/file-download'; // Import the download icon
import Dialog from 'material-ui/Dialog';
import FlatButton from 'material-ui/FlatButton';

class ImageResults extends Component {
    state = {
        open: false,
        currentImg: '',
    };

    handleOpen = (img) => {
        this.setState({ open: true, currentImg: img });
    };

    handleClose = () => {
        this.setState({ open: false });
    };

    handleDownload = (imgUrl) => {
        fetch(imgUrl)
            .then((response) => response.blob())
            .then((blob) => {
                const url = window.URL.createObjectURL(blob);

                // Create a virtual anchor element to trigger the download
                const downloadLink = document.createElement('a');
                downloadLink.href = url;
                downloadLink.download = 'image.jpg'; // You can customize the file name

                // Append the anchor to the body
                document.body.appendChild(downloadLink);

                // Trigger a click event on the anchor
                downloadLink.click();

                // Remove the anchor from the body
                document.body.removeChild(downloadLink);
            })
            .catch((error) => {
                console.error('Error downloading image:', error);
            });
    };

    render() {
        const { images } = this.props;

        return (
            <div className="mx-auto max-w-5xl p-8">
                <div className="grid grid-cols-1 md:grid-cols-4 gap-4">
                    {images &&
                        images.map((img) => (
                            <div key={img.id} className="relative group overflow-hidden">
                                <img
                                    src={img.largeImageURL}
                                    alt={img.tags}
                                    className="w-full h-full object-cover cursor-pointer"
                                    onClick={() => this.handleOpen(img.largeImageURL)}
                                />
                                <div className="absolute inset-0 flex flex-col justify-end hidden group-hover:flex items-center bg-black bg-opacity-50 transition-opacity duration-300">
                                    <div className="flex items-center gap-4 mb-4">
                                        <IconButton onClick={() => this.handleOpen(img.largeImageURL)}>
                                            <ZoomIn color="white" />
                                        </IconButton>
                                        <IconButton onClick={() => this.handleDownload(img.largeImageURL)}>
                                            <FileDownload color="white" />
                                        </IconButton>
                                    </div>
                                </div>
                            </div>
                        ))}
                </div>

                <Dialog
                    actions={[<FlatButton label="Close" primary={true} onClick={this.handleClose} />]}
                    modal={false}
                    open={this.state.open}
                    onRequestClose={this.handleClose}
                >
                    <img src={this.state.currentImg} alt="" className="w-full" />
                </Dialog>
            </div>
        );
    }
}

ImageResults.propTypes = {
    images: PropTypes.array.isRequired,
};

export default ImageResults;