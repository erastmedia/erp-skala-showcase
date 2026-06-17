# Public Repository Sanitization Checklist

Before publishing any repository to GitHub as public, complete this checklist.

## Secret and Credential Check

Do not publish:

- [ ] `.env`
- [ ] `.env.production`
- [ ] database credentials
- [ ] SMTP credentials
- [ ] API keys
- [ ] payment gateway keys
- [ ] OAuth client secrets
- [ ] app encryption keys
- [ ] private SSH keys
- [ ] VPS usernames or private IP details
- [ ] GitHub tokens
- [ ] deployment webhook secrets

## Data Check

Do not publish:

- [ ] production database dump
- [ ] real customer data
- [ ] real employee/payroll data
- [ ] real financial records
- [ ] invoice images
- [ ] receipt uploads
- [ ] logs containing request headers or tokens

## Documentation Check

Remove or generalize:

- [ ] private roadmap details
- [ ] pricing strategy not ready for public
- [ ] internal business assumptions
- [ ] server directory structure
- [ ] deployment credentials
- [ ] admin emails/passwords
- [ ] real phone numbers except public business contact
- [ ] internal notes that may look unprofessional

## Git History Check

If publishing a repo copied from a private repo:

- [ ] do not preserve private commit history unless fully audited
- [ ] create a clean public repository instead
- [ ] copy only curated files
- [ ] use dummy data
- [ ] rotate any credential that was ever committed by mistake

## Public Repo Positioning Check

Make sure the repository clearly says:

- [ ] this is a showcase repo
- [ ] this is not full production source
- [ ] code samples are sanitized
- [ ] license terms are clear
- [ ] demo links are available
- [ ] screenshots are safe to show
