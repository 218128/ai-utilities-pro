<?php

namespace App\Controllers;

class PrivacyPolicyController {
    public function index() {
        $policy = '';
        $companyName = '';
        $websiteName = '';
        $websiteUrl = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $companyName = $_POST['company_name'] ?? '';
            $websiteName = $_POST['website_name'] ?? '';
            $websiteUrl = $_POST['website_url'] ?? '';

            if ($companyName && $websiteName && $websiteUrl) {
                $policy = $this->generatePolicy($companyName, $websiteName, $websiteUrl);
            }
        }

        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text">Privacy Policy Generator</span></h1>
                <p>Generate a standard privacy policy for your website instantly.</p>
            </div>

            <div class="card" style="max-width: 800px; margin: 0 auto;">
                <form method="post" action="/tools/privacy-policy-generator">
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" id="company_name" name="company_name" value="<?= htmlspecialchars($companyName) ?>" placeholder="e.g. My Company LLC" required>
                    </div>
                    <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" id="website_name" name="website_name" value="<?= htmlspecialchars($websiteName) ?>" placeholder="e.g. My Awesome Site" required>
                    </div>
                    <div class="form-group">
                        <label for="website_url">Website URL</label>
                        <input type="url" id="website_url" name="website_url" value="<?= htmlspecialchars($websiteUrl) ?>" placeholder="https://example.com" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Generate Policy</button>
                </form>

                <?php if ($policy): ?>
                    <div style="margin-top: 2rem;">
                        <h3 style="margin-bottom: 1rem;">Your Privacy Policy</h3>
                        <textarea style="width: 100%; height: 400px; padding: 1rem; background: var(--bg-dark); color: var(--text-main); border: 1px solid var(--border-color); border-radius: 8px;" readonly><?= htmlspecialchars($policy) ?></textarea>
                        <button onclick="copyPolicy()" class="btn btn-secondary" style="width: 100%; margin-top: 1rem;">Copy to Clipboard</button>
                    </div>
                    <script>
                        function copyPolicy() {
                            const textarea = document.querySelector('textarea');
                            textarea.select();
                            document.execCommand('copy');
                            alert('Privacy Policy copied to clipboard!');
                        }
                    </script>
                <?php endif; ?>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        $title = "Privacy Policy Generator - AI Utilities Pro";
        $description = "Generate a free privacy policy for your website. Essential for AdSense and GDPR compliance.";
        require __DIR__ . '/../../templates/layout.php';
    }

    private function generatePolicy($company, $siteName, $url) {
        $date = date('Y-m-d');
        return <<<EOT
Privacy Policy for $company

At $siteName, accessible from $url, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by $siteName and how we use it.

If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.

Log Files
$siteName follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.

Cookies and Web Beacons
Like any other website, $siteName uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.

Google DoubleClick DART Cookie
Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads

Privacy Policies
You may consult this list to find the Privacy Policy for each of the advertising partners of $siteName.

Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on $siteName, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.

Note that $siteName has no access to or control over these cookies that are used by third-party advertisers.

Third Party Privacy Policies
$siteName's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.

Children's Information
Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.

$siteName does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.

Online Privacy Policy Only
This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in $siteName. This policy is not applicable to any information collected offline or via channels other than this website.

Consent
By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.

Last updated: $date
EOT;
    }
}
?>
