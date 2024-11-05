<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    html {
        height: 100%;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f2f5;
    }

    .home-container {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .section {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .top-section {
        background: url('https://source.unsplash.com/1600x900/?sunset,mountains') center/cover no-repeat;
    }

    .bottom-section {
        background: linear-gradient(135deg, #4caf50, #1e90ff);
    }

    .content {
        z-index: 1;
        max-width: 600px;
        padding: 20px;
        color: #ffffff;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
    }

    .content h1 {
        font-size: 3em;
        font-weight: bold;
        margin-bottom: 10px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .content h2 {
        font-size: 2.5em;
        font-weight: bold;
    }

    .content p {
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .btn {
        padding: 12px 24px;
        font-size: 1.1em;
        text-decoration: none;
        color: #fff;
        border-radius: 5px;
        transition: all 0.3s ease;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    .discover-btn {
        background-color: #ff5722;
        border: 2px solid #ff5722;
    }

    .create-post-btn {
        background-color: #008080;
        border: 2px solid #008080;
    }

    .discover-btn:hover {
        background-color: #ff7043;
        color: #ffffff;
        border-color: #ff7043;
    }

    .create-post-btn:hover {
        background-color: #20b2aa;
        color: #ffffff;
        border-color: #20b2aa;
    }
</style>

<body>
    <div class="home-container">

        <div class="section top-section">
            <div class="content">
                <h1>Welcome to Our Forum</h1>
                <p>Discover topics, share ideas, and engage with the community.</p>
                <a href="?page=module/blog&action=listblog" class="btn discover-btn">Discover Forum</a>
            </div>
        </div>


        <div class="section bottom-section">
            <div class="content">
                <h2>Ready to Share Your Thoughts?</h2>
                <p>Join the conversation and create your own post.</p>
                <a href="?page=module/blog&action=create" class="btn create-post-btn">Create Your Post</a>
            </div>
        </div>
    </div>
</body>