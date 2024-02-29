import "./FooterStyles.css";

const Footer = () => {
  return (
    <div className="footer">
      <div className="top">
        <div>
          <h1>Travels and Tales</h1>
          <p>Search your favourite destinations</p>
        </div>
        <div>
          <a href="/" className="facebook">
            <i className="fa-brands fa-facebook-square"></i>
          </a>
          <a href="/">
            <i className="fa-brands fa-instagram-square"></i>
          </a>
          <a href="/">
            <i className="fa-brands fa-github-square"></i>
          </a>
        </div>
      </div>
      <div className="bottom">
        <div>
          <h3>project</h3>
          <a href="/">Status</a>
          <a href="/">License</a>
          <a href="/">ChangeLog</a>
        </div>
        <div>
          <h3>comunity</h3>
          <a href="/">Github</a>
          <a href="/">Issues</a>
          <a href="/">Twitter</a>
        </div>
        <div>
          <h3>help</h3>
          <a href="/">Support</a>
          <a href="/">Troubleshoot</a>
          <a href="/">Contact</a>
        </div>
        <div>
          <h3>others</h3>
          <a href="/">Policy</a>
          <a href="/">Service</a>
          <a href="/">License</a>
        </div>
      </div>
    </div>
  );
};

export default Footer;
